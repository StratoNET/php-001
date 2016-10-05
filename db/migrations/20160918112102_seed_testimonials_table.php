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
      $this->execute("
          insert into testimonials (title, testimonial, user_id, created_at)
          values
          ('Biscuits, custard & belly-rubs...', 'I just wanted to let you know that I will eat anything mentioned in the title of this testimonial and will
           guarantee to lick you mercilessly if you give it to me. I will eat anything else too, honest I will !!!', 2, '2016-09-23 19:27:00')
      ");
    }

    public function down()
    {
      // not used in this context, however phinx requires its presence
    }
}
