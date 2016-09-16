<?php
namespace Udemy\validation;

use Respect\Validation\Validator as checkInput;

class validator {

  public function isValid($criteria) {

    $current_sequential_error = "";

    foreach ($criteria as $description => $value) {

      $field = explode(":", $description);

      $rules = explode("|", $value);

      foreach ($rules as $aRule) {

        $rule = explode(":", $aRule);

        switch ($rule[0]) {
          case 'length':
            $min = $rule[1];
            $max = $rule[2];
            if (checkInput::stringType()->length($min, $max)->validate($_REQUEST[$field[0]]) == false) {
              $current_sequential_error = $field[1] . " must contain at least " . $min . " and no more than " . $max . " characters.";
            }
            break;
          case 'email':
            if (checkInput::email()->validate($_REQUEST[$field[0]]) == false) {
              $current_sequential_error = "Please input a valid " . $field[1] . " address.";
            }
            break;
          case 'equalTo':
            if (checkInput::identical($_REQUEST[$field[0]])->validate($_REQUEST[$rule[1]]) == false) {
              $current_sequential_error = $field[1] . " and its verification do NOT match, please try again";
            }
            break;
          default:
          // do nothing
        }
      }
    }
    return $current_sequential_error;
  }
}
