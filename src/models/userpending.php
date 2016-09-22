<?php
namespace Udemy\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserPending extends Eloquent
{
  // to prevent Eloquent searching for 'users_pending(s)', protected variable will override
  protected $table = 'users_pending';
}
