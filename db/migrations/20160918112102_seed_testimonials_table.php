<?php

use Phinx\Migration\AbstractMigration;

class SeedTestimonialsTable extends AbstractMigration
{
    public function up()
    {
      $this->execute("
          insert into testimonials (title, testimonial, user_id, created_at)
          values
          ('Just wanted to say...', 'I think this is wonderful !', 1, '2016-09-18 12:30:00')
      ");
    }

    public function down()
    {
      // not used in this context, however phinx requires its presence
    }
}
