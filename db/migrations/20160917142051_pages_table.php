<?php

use Phinx\Migration\AbstractMigration;

class PagesTable extends AbstractMigration
{
  public function up()
  {
    $users = $this->table('pages');
    $users->addColumn('title', 'string')
          ->addColumn('content', 'text')
          ->addColumn('created_at', 'datetime', ['null' => true])
          ->addColumn('updated_at', 'datetime', ['null' => true])
          ->save();
  }
  public function down()
  {
    $this->dropTable('pages');
  }
}
