<?php
namespace Udemy\controllers;

use Udemy\validation\validator;  /* required, as will NOT inherit from BaseController */
use Udemy\models\user;

class RegisterController extends BaseController
{
    public function getRegisterPage()
    {
      echo $this->blade->render("register");
    }

    public function postRegisterPage()
    {
        $criteria = [
      "first_name:First name" => "length:3:64",
      "last_name:Last name"   => "length:3:64",
      "email:Email address"   => "email|equalTo:verify_email",
      "verify_email:email"    => "email",
      "password:Password"     => "length:9:16|equalTo:verify_password",
    ];

    // validate data...
    $validator = new validator();

        $current_sequential_error = $validator->isValid($criteria);

    // if validation fails, get register page & display error...

    if (strlen($current_sequential_error) > 0)
    {
        $_SESSION['curr_seq_err'] = $current_sequential_error;
        echo $this->blade->render("register");
        unset($_SESSION['curr_seq_err']);
        exit();
    }

    // save data to database...
    $user = new user();
        $user->first_name = $_REQUEST['first_name'];
        $user->last_name = $_REQUEST['last_name'];
        $user->email = $_REQUEST['email'];
        $user->password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $user->save();

        echo "Registration posted !";
    }
}
