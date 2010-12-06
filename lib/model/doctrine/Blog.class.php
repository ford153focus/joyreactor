<?

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Blog extends BaseBlog {
    public function getRating($page=1) {
        $query = Doctrine_Query::create()
            ->useResultCache(true, 3600)
            ->select('sum(p.rating)')
            ->from('Post p, p.BlogPosts b')
            ->where('b.blog_id = ?', $this->getId())
            ->andWhereIn('p.type', array("post", 'seo-content'))
            ->execute();
        $query = $query[0];
        return number_format($query['sum'],1); 
    }

    public function getLine($page=1) {
        $query = Doctrine_Query::create()
            ->select('p.*')
            ->from('Post p, p.BlogPosts b')
            ->where('b.blog_id = ?', $this->getId())
            ->andWhereIn('p.type', array("post", 'seo-content'))
            ->orderBy('b.created_at desc');
        if(sfContext::getInstance()->getUser()->isAnonymous())
            $query->addWhere('p.rating  >= ?', sfConfig::get('app_post_worstpage_threshold'));
        if($page !== 'count') {
            $query = new Doctrine_Pager($query,$page,sfConfig::get('app_posts_per_page'));
            return $query->execute();
        }
        else
            return $query->count();
    }

    public function getUserLine($user, $page=1) {
        $query = Doctrine_Query::create()
            ->select('p.*')
            ->from('Post p, p.BlogPosts b')
            ->where('b.blog_id = ?', $this->getId())
            ->andWhere('p.type = ?', "post")
            ->andWhere('p.user_id = ?', $user->getId())
            ->orderBy('b.created_at desc');
        if(sfContext::getInstance()->getUser()->isAnonymous())
            $query->addWhere('p.rating  >= ?', sfConfig::get('app_post_worstpage_threshold'));
        if($page !== 'count') {
            $query = new Doctrine_Pager($query,$page,sfConfig::get('app_posts_per_page'));
            return $query->execute();
        }
        else
            return $query->count();
    }

    /**
     * Объединяет два блога. Текущий удаляется
     *
     * @param Blog $newBlog тэг, в который слить текущий
     */
    public function MergeBlogs($newBlog)
    {
      if($this->getId() == $newBlog->getId())
        return;
        
      // удаляем все записи из блога, которые уже есть в новом блоге
      $query = "DELETE bp1
        FROM blog_post bp1
        LEFT JOIN blog_post bp2 ON bp1.post_id = bp2.post_id
        WHERE bp1.blog_id = " . $this->getId() . "
        AND bp2.blog_id = " . $newBlog->getId();
      Doctrine_Manager::connection()->execute($query);

      // меняем все записи на новый блог
      Doctrine_Query::create()
        ->update('BlogPost')
        ->set('blog_id', $newBlog->getId())
        ->where('blog_id = ?', $this->getId())->execute();

      // удаляем нас
      $this->delete();
    }

    // *****Static Methods*****
    /**
     * Возвращает массив со списком наиболее популярных тэгов
     *
     * @return array список тэгов
     */
    public static function getTags() {
        $query = Doctrine_Query::create()
            ->select('b.tag, b.count')
            ->from('Blog b')
            ->orderBy('b.best desc, b.count desc')
            ->limit(20)
            ->execute();
        $res = array();
        $res['tags'] = array();
        $res['max'] = false;
        $res['min'] = false;
        foreach($query as $row) {
            if($row['count'] <= 0)
              continue;

            $res['tags'][] = array('tag' => $row['tag'], 'count' => $row['count']);
            if(!$res['max'] || $res['max'] < $row['count'])
            {
              $res['max'] = $row['count'];
            }
            if(!$res['min'] || $res['min'] > $row['count'])
            {
              $res['min'] = $row['count'];
            }
        }

        // небольшой хак, чтобы не глючило если они одинаковые
        if($res['max'] == $res['min'])
          $res['max']++;
        return $res;
    }

    public static function getByTag($tag) {
        $query = Doctrine_Query::create()
            ->select()
            ->from('Blog b')
            ->where('b.tag = ?', $tag);
        return $query->fetchOne();
    }

    public static function getOrCreateByTag($tag, $user=null) {
        $blog = self::getByTag($tag);
        if(!$blog) {
            $blog = new Blog();
            $blog->setTag($tag);
            $blog->setName($tag);
            if($user)
                $blog->setUserId($user["id"]);
            else
                $blog->setUserId(1);
            $blog->save();
        }
        return $blog;
    }

    public static function getNoBlogLine($page=1) {
        $query = Doctrine_Query::create()
            ->select('*')
            ->from('Post p')
            ->where('not exists(select * from blog_post where post_id = p.id)')
            ->andWhere('p.type = ?', "post")
            ->orderBy('p.created_at desc');
        if($page !== 'count') {
            $query = new Doctrine_Pager($query,$page,sfConfig::get('app_posts_per_page'));
            return $query->execute();
        }
        else
            return $query->count();
    }

    public static function getList($page = 1) {
        $query = Doctrine_Query::create()
            ->select()
            ->from('Blog b')
            ->orderBy('b.best desc, b.count desc');

        if($page !== 'count') {
            $query = new Doctrine_Pager($query,$page,sfConfig::get('app_blogs_per_page'));
            return $query->execute();
        }
        else
            return $query->count();
    }
}
