<?php
namespace Udemy\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Testimonial extends Eloquent
{
  public function user()
  {
    return $this->hasOne('Udemy\models\user');
  }
}
