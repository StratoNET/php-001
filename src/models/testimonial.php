<?php
namespace Udemy\models;

use illuminate\database\Eloquent\Model as eloquent;

class testimonial extends eloquent
{
  public function user()
  {
    return $this->hasOne('Udemy\models\user');
  }
}
