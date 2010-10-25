<? use_helper('Javascript', 'Text', 'Form', 'Parse', 'UserTime', 'DeltaCount'); ?>
<?if(!isset($show_comments)) $show_comments=0 ?>
<?if(!isset($showAddComment)) $showAddComment=0 ?>
<div class="article post-<? echo $post->getMoodName() ?>">
    <div class="uhead">
        <? if($sf_user->isAuthenticated()): ?>
            <? include_partial('favorite/link', array('post' => $post)) ?>
        <? endif ?>
        <big><big>
            <? echo image_tag("/images/smile_".$post->getMoodName().".png",array('height'=>24))?>
            <a <?if($post->getUser()->isOnline()) {
                    echo 'class="online_username" ';
                    if($post->getUser()->getLastStatus() && $post->getUser()->getLastStatus()->getText())
                        echo 'title="'.$post->getUser()->getLastStatus()->getText().'"';
                    else
                        echo 'title="'.__('сейчас на сайте').'"';
                 } else {
                    echo 'class="offline_username"';
                    if($post->getUser()->getLastStatus() && $post->getUser()->getLastStatus()->getText())
                        echo 'title="'.$post->getUser()->getLastStatus()->getText().'"';
                 }?>
                href="<?echo url_for('post/user?username='.$post->getUser()->getUsername())?>">
                <?echo $post->getUser()->getUsername()?>
            </a>
        </big></big>
    </div><!-- /uhead -->
    <?if(!($sf_user->isAuthenticated() && $sf_user->getGuardUser()->isHidden($post))):?>
        <?include_partial('post/post_content', array('post' => $post)) ?>
    <?else:?>
        <?if($post->getBlogs()->count() != 0):?>
        <span style="display:block; color:#666;">
            <?
            foreach($post->getBlogs() as $blog)
                echo link_to($blog->getTag(), 'blog/show?name='.$blog->getTag(ESC_RAW), array("absolute" => "true", "title" => $blog->getName()))." ";
            ?>
        </span>
        <?endif?>
    <?endif?>
    <div class="ufoot">
        <span class="date">
            <? echo user_time($post->getCreatedAt()) ?>
        </span>
        <span class="manage">
	    <? echo link_to(__('поделиться'), 'post/show?id='.$post->getId(), array('id' => 'post_share_link'.$post->getId(), 'title' => __('поделиться ссылкой на пост с друзьями'), 'class'=>'link', 'onclick' => '$j("#post_share_form'.$post->getId().'").toggle("fast");return false;')) ?>&nbsp;
            <? if($sf_user->isAuthenticated() && $sf_user->getGuardUser() == $post->getUser()): ?>
                <? echo link_to(__('удалить'), 'post/delete?id='.$post->getId(), array('title' => __('удалить пост'), 'class'=>"delete", 'onclick' => "return confirm('".__('Действительно удалить пост?')."')")) ?>&nbsp;
                <? echo link_to(__('теги'), 'post/show?id='.$post->getId(), array('id' => 'post_settag_link'.$post->getId(), 'title' => __('изменить тег'), 'class'=>'link', 'onclick' => '$j("#post_settag_form'.$post->getId().'").toggle("fast");return false;')) ?>&nbsp;
            <? endif ?>
            <? if($sf_user->isAuthenticated() && $sf_user->getGuardUser() != $post->getUser()): ?>
                <? echo link_to(__('добавить теги'), 'post/show?id='.$post->getId(), array('id' => 'post_settag_link'.$post->getId(), 'title' => __('изменить теги'), 'class'=>'link', 'onclick' => '$j("#post_settag_form'.$post->getId().'").toggle("fast");return false;')) ?>&nbsp;
            <? endif ?>
            <? if($sf_user->isAuthenticated()): ?>
                <? echo link_to('ссылка', 'post/show?id='.$post->getId()."&partnerId=".$sf_user->getGuardUser()->getId(), array('title' => __('ссылка на пост'), 'class'=>'link')) ?>
            <? else: ?>
                <? echo link_to('ссылка', 'post/show?id='.$post->getId(), array('title' => __('ссылка на пост'), 'class'=>'link')) ?>
            <? endif ?>
            <? include_partial('hidden/link', array('post' => $post, 'showAddComment' => $showAddComment, 'show_comments' => $show_comments)) ?>
        </span>
        <? if(!isset($noCommentsLinks) || !$noCommentsLinks): ?>
        <span class="comments">
            <? echo link_to($post->getCommentsCount(), 'post/show?id='.$post->getId(), array('title' => __('количество комментариев'), 'class'=>'commentnum', 'onclick' => '$j("#post_comment_list'.$post->getId().'").toggle("fast").load("'.url_for("post/comments?id=".$post->getId()).'");return false;')) ?>
            <?if(getDeltaCount($sf_user, $post->getCommentsCount(), "comments".$post->getId()) > 0):?>
                <span class="commentnumDelta" title="колличество новых комментариев">
                    <? echo "+".getDeltaCount($sf_user, $post->getCommentsCount(), "comments".$post->getId()) ?>
                </span>
            <?endif?>
        </span>
        <? endif ?>
        <span style="display:none;" id="post_settag_form<?echo $post->getId()?>">
            <?echo form_remote_tag(array( 'url' => "post/settag?id=".$post->getId(), 'update' => 'postContainer'.$post->getId()))?>
                <?if($post->getBlogs()->count() != 0 && $post->getUser() == $sf_user->getGuardUser()) $tag = $post->getTagline(); else $tag="";?>
                <?echo input_tag("tag",$tag)?>
                <?echo submit_tag(__("Сохранить"))?>
            </form>
        </span>
	<span style="display:none;margin-top:10;" id="post_share_form<?echo $post->getId()?>">
		<span style="float:left;">
		<script type="text/javascript">
			document.write(VK.Share.button({url: "<?echo url_for('post/show?id='.$post->getId(), array('absolute' => true))?>"},{type: "link", text: "Сохранить"}));
		</script>
		</span>&nbsp;
		<iframe src="http://www.facebook.com/plugins/like.php?href=<?echo url_for('post/show?id='.$post->getId(), array('absolute' => true))?>&amp;layout=button_count&amp;show_faces=true&amp;width=110&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:21px;" allowTransparency="true"></iframe>&nbsp;
		<iframe allowtransparency="true" frameborder="0" scrolling="no"
        src="http://platform.twitter.com/widgets/tweet_button.html?url=<?echo urlencode(url_for('post/show?id='.$post->getId(), array('absolute' => true)))?>"
        style="width:130px; height:21px;"></iframe>
        <br/>
        <label for='share-blog'><?echo __('Код для блога:')?></label>
        <input value='<?echo $post->getBlogCode()?>' name='share-blog' readonly='true' />
        <label for='share-forum'><?echo __('Код для форума:')?></label>
        <input value='<?echo $post->getForumCode()?>' name='share-forum' readonly='true' />
	</span>
        <div id="post_comment_list<?echo $post->getId()?>" <?if(!$show_comments):?>style="display:none;"<?endif?>>
            <?if($show_comments):?>
                <?include_partial('post/post_comments', array('post' => $post, 'showAddComment' => $showAddComment))?>
            <?endif?>
        </div>
        <? include_partial('post_vote/link', array('post' => $post)) ?>
    </div>
</div><!-- /article -->
