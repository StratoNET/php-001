<?php
namespace Udemy\models;

use illuminate\database\Eloquent\Model as eloquent;

class User extends eloquent
{
  public function testimonials()
  {
    return $this->hasMany('Udemy\models\testimonial');
  }
}
