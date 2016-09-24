<?php

use Phinx\Migration\AbstractMigration;

class AddUniqueEmailIndexToUsersTable extends AbstractMigration
{
  public function change()
  {
    $table = $this->table('users');
    $table->addIndex(['email'], ['unique' => true])
          ->save();
  }
}
