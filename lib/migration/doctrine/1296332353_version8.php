<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version8 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addIndex('post_attribute', 'value', array(
             'fields' => 
             array(
              0 => 'value(333)',
             ),
             ));
        $this->addIndex('post_comment_attribute', 'value', array(
             'fields' => 
             array(
              0 => 'value(333)',
             ),
             ));
    }

    public function down()
    {
        $this->removeIndex('post_attribute', 'value', array(
             'fields' => 
             array(
              0 => 'value(333)',
             ),
             ));
        $this->removeIndex('post_comment_attribute', 'value', array(
             'fields' => 
             array(
              0 => 'value(333)',
             ),
             ));
    }
}