<?php

use Phinx\Migration\AbstractMigration;

class SeedUsersTable extends AbstractMigration
{
    public function up()
    {
      $password_hash = password_hash('grasshopper', PASSWORD_DEFAULT);

      $this->execute("
      insert into users (first_name, last_name, email, password, active, access_level)
      values ('Peter', 'Barrett', 'peterbarrett@fastmail.net', '$password_hash', '1', '1')
      ");
      $this->execute("
      insert into users (first_name, last_name, email, password, active, access_level)
      values ('Costa', 'The Dog', 'costa@doghouse.com', '$password_hash', '1', '0')
      ");
    }

    public function down()
    {
      // not used in this context, however phinx requires its presence
    }
}
