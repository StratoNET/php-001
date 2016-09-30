<?php
namespace Udemy\controllers;

use Udemy\models\user;
use Udemy\auth\LoggedIn;

class AuthenticationController extends BaseController
{
    public function getLoginPage()
    {
      // need to pass signing code to hidden form field
      echo $this->blade->render("login", [
        'signer' => $this->signer,
      ]);
    }

    public function postLoginPage()
    {
      // initial test to validate signature, otherwise disallow posting
      if (!$this->signer->validateSignature($_POST['_token'])) {
           header('HTTP/1.0 400 Bad Request');
           exit();
       }

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
        $_SESSION['curr_seq_err'] = "Oops... invalid login, please check your email and/or password input.<br/><br/>".
                                    "(if you are a new registrant please ensure your account has been activated<br/>".
                                    "by clicking the link in the activation email sent to your email address)";
        echo $this->blade->render("login", [
          'signer' => $this->signer,
        ]);
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
