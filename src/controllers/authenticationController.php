<?php
namespace Udemy\controllers;

use Udemy\models\user;
use Udemy\auth\LoggedIn;

class AuthenticationController extends BaseController
{
    public function getLoginPage()
    {
      echo $this->blade->render("login");
    }

    public function postLoginPage()
    {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $authorised = true;

      // look up the user attempting to login, can use first() as email is unique
      $user = User::where('email', '=', $email)->first();

      // validate user email & password provided user is found, also ensuring their account is activated
      if (is_null($user) || ($user->active == false)) {
        $authorised = false;
      } else {
        $authorised = password_verify($password, $user->password);
      }

      // login & redirect to homepage or retry on error
      if ($authorised) {
        $_SESSION['user'] = $user;
        header("Location: /");
        exit();
      } else {
        $_SESSION['curr_seq_err'] = "Oops... invalid login, please check your email and/or password input.";
        echo $this->blade->render("login");
        unset($_SESSION['curr_seq_err']);
        exit();
      }
    }

    public function getLogout()
    {
      unset($_SESSION['user']);
      session_destroy();
      header("Location: /login");
      exit();
    }
}
