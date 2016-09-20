<?php
namespace Udemy\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
  public function testimonials()
  {
    return $this->hasMany('Udemy\models\testimonial');
  }
}
