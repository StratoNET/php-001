<?php

use Phinx\Migration\AbstractMigration;

class PagesTable extends AbstractMigration
{
  public function up()
  {
    $users = $this->table('pages');
    $users->addColumn('title', 'string')
          ->addColumn('content', 'text')
          ->addColumn('created_at', 'datetime', ['null' => 'CURRENT_TIMESTAMP'])
          ->addColumn('updated_at', 'datetime', ['null' => 'CURRENT_TIMESTAMP'])
          ->save();
  }
  public function down()
  {
    $this->dropTable('pages');
  }
}
