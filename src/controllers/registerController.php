<?php
namespace Udemy\controllers;

use Udemy\validation\validator;  /* required, as will NOT inherit from BaseController */
use Udemy\models\user;
use Udemy\models\userpending;
use Udemy\email\sendemail;

class RegisterController extends BaseController
{
    public function getRegisterPage()
    {
      // need to pass signing code to hidden form field
      echo $this->blade->render("register", [
        'signer' => $this->signer,
      ]);
    }

    public function postRegisterPage()
    {
        $criteria = [
      "first_name:First name" => "length:3:64",
      "last_name:Last name"   => "length:3:64",
      "email:Email address"   => "email|equalTo:verify_email|unique:User",
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
          echo $this->blade->render("register", [
            'signer' => $this->signer,
          ]);
          unset($_SESSION['curr_seq_err']);
          exit();
      }

      // save user data to database...
      $user = new user();
          $user->first_name = $_POST['first_name'];
          $user->last_name = $_POST['last_name'];
          $user->email = $_POST['email'];
          $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $user->save();

      // generate new registrant account activation token immediately after saving
      // user, before sending activation email, as it will require the user id...
      $token = md5(uniqid(rand(), true)) . md5(uniqid(rand(), true));
      $user_pending = new UserPending();
      $user_pending->token = $token;
      $user_pending->user_id = $user->id;
      $user_pending->save();

      // send welcome/activation email to new registrant with its token
      $message = $this->blade->render('emails.welcome_email', ['token' => $token]);
      SendEmail::sendEmail($user->email, "Welcome to Cycling for Everyone", $message);

      header("Location: /registration_successful");
      exit();
    }

    public function getActivateAccount()
    {
      // initialize user_pending as a non-existent user & get token returned via email link...
      $user_pending = null;
      $token = $_GET['token'];

      // look up the unique token value in the users_pending table...
      $user_pending = UserPending::where('token', '=', $token)->first();

      // if token found (ie. user_pending NOT null), find user in users table & activate account...
      if (isset($user_pending)) {
        $user_id = $user_pending->user_id;
        $user = User::find($user_id);
        $user->active = 1;
        $user->save();

        // activation is one-time only, therefore delete corresponding redundant entry...
        UserPending::where('token', '=', $token)->delete();

        header("Location: /account_activated");
        exit();

      } else {

        header("Location: /page_not_found");
        exit();

      }

    }
}
