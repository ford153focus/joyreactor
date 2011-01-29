<?php

/**
 * BasePostComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property integer $post_id
 * @property integer $parent_id
 * @property string $comment
 * @property string $comment_original
 * @property integer $power
 * @property boolean $isNew
 * @property sfGuardUser $User
 * @property Post $Post
 * @property PostComment $Parent
 * @property Doctrine_Collection $Comments
 * @property Doctrine_Collection $Attributes
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method integer             getUserId()           Returns the current record's "user_id" value
 * @method integer             getPostId()           Returns the current record's "post_id" value
 * @method integer             getParentId()         Returns the current record's "parent_id" value
 * @method string              getComment()          Returns the current record's "comment" value
 * @method string              getCommentOriginal()  Returns the current record's "comment_original" value
 * @method integer             getPower()            Returns the current record's "power" value
 * @method boolean             getIsNew()            Returns the current record's "isNew" value
 * @method sfGuardUser         getUser()             Returns the current record's "User" value
 * @method Post                getPost()             Returns the current record's "Post" value
 * @method PostComment         getParent()           Returns the current record's "Parent" value
 * @method Doctrine_Collection getComments()         Returns the current record's "Comments" collection
 * @method Doctrine_Collection getAttributes()       Returns the current record's "Attributes" collection
 * @method PostComment         setId()               Sets the current record's "id" value
 * @method PostComment         setUserId()           Sets the current record's "user_id" value
 * @method PostComment         setPostId()           Sets the current record's "post_id" value
 * @method PostComment         setParentId()         Sets the current record's "parent_id" value
 * @method PostComment         setComment()          Sets the current record's "comment" value
 * @method PostComment         setCommentOriginal()  Sets the current record's "comment_original" value
 * @method PostComment         setPower()            Sets the current record's "power" value
 * @method PostComment         setIsNew()            Sets the current record's "isNew" value
 * @method PostComment         setUser()             Sets the current record's "User" value
 * @method PostComment         setPost()             Sets the current record's "Post" value
 * @method PostComment         setParent()           Sets the current record's "Parent" value
 * @method PostComment         setComments()         Sets the current record's "Comments" collection
 * @method PostComment         setAttributes()       Sets the current record's "Attributes" collection
 * 
 * @package    Empaty
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePostComment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('post_comment');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('post_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('parent_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 4,
             ));
        $this->hasColumn('comment', 'string', 2147483647, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 2147483647,
             ));
        $this->hasColumn('comment_original', 'string', 2147483647, array(
             'type' => 'string',
             'length' => 2147483647,
             ));
        $this->hasColumn('power', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             'length' => 4,
             ));
        $this->hasColumn('isNew', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));


        $this->index('user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             'type' => NULL,
             ));
        $this->index('post_id', array(
             'fields' => 
             array(
              0 => 'post_id',
             ),
             'type' => NULL,
             ));
        $this->index('parent_id', array(
             'fields' => 
             array(
              0 => 'parent_id',
             ),
             'type' => NULL,
             ));
        $this->index('isNew', array(
             'fields' => 
             array(
              0 => 'isNew',
             ),
             'type' => NULL,
             ));
        $this->index('created_at', array(
             'fields' => 
             array(
              0 => 'created_at',
             ),
             'type' => NULL,
             ));
        $this->index('updated_at', array(
             'fields' => 
             array(
              0 => 'updated_at',
             ),
             'type' => NULL,
             ));
        $this->option('type', 'MYISAM');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('Post', array(
             'local' => 'post_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('PostComment as Parent', array(
             'local' => 'parent_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('PostComment as Comments', array(
             'local' => 'id',
             'foreign' => 'parent_id'));

        $this->hasMany('PostCommentAttribute as Attributes', array(
             'local' => 'id',
             'foreign' => 'post_comment_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}