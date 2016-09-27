<?php

use Phinx\Migration\AbstractMigration;

class AddAccessLevelToUsersTable extends AbstractMigration
{
    public function change()
    {
      $table = $this->table('users');
      $table->addColumn('access_level', 'integer', ['default' => '0' ])
            ->save();
    }
}
