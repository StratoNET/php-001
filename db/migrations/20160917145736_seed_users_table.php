<?php

use Phinx\Migration\AbstractMigration;

class SeedUsersTable extends AbstractMigration
{
    public function up()
    {
      $password_hash = password_hash('grasshopper', PASSWORD_DEFAULT);

      $this->execute("
      insert into users (first_name, last_name, email, password)
      values ('Peter', 'Barrett', 'pedrobarretto@27.net', '$password_hash')
      ");
    }

    public function down()
    {
      // not used in this context, however phinx requires its presence
    }
}
