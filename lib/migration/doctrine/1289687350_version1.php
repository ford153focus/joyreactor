<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version1 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('blog', 'best', 'integer', '1', array(
             'notnull' => '1',
             'default' => '0',
             ));
        $this->addColumn('blog', 'count', 'integer', '4', array(
             'notnull' => '1',
             'default' => '0',
             ));
        $this->addColumn('blog', 'description', 'string', '4096', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('blog', 'best');
        $this->removeColumn('blog', 'count');
        $this->removeColumn('blog', 'description');
    }
}
