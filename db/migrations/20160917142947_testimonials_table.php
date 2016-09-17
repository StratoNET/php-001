<?php

use Phinx\Migration\AbstractMigration;

class TestimonialsTable extends AbstractMigration
{
  public function up()
  {
    $users = $this->table('testimonials');
    $users->addColumn('title', 'string')
          ->addColumn('testimonial', 'text')
          ->addColumn('user_id', 'integer')
          ->addForeignKey('user_id', 'users', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
          ->addColumn('created_at', 'datetime', ['null' => 'CURRENT_TIMESTAMP'])
          ->addColumn('updated_at', 'datetime', ['null' => 'CURRENT_TIMESTAMP'])
          ->save();
  }
  public function down()
  {
    $this->dropTable('testimonials');
  }
}
