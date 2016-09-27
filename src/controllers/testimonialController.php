<?php
namespace Udemy\controllers;

use Udemy\validation\validator;  /* required, as will NOT inherit from BaseController */
use Udemy\models\testimonial;
use Udemy\auth\LoggedIn;

class TestimonialController extends BaseController
{
    public function getTestimonials()
    {
      $testimonials = Testimonial::all();
      echo $this->blade->render('testimonials', [
        'testimonials' => $testimonials,
      ]);
    }

    public function getAddTestimonialPage()
    {
      // need to pass signing code to hidden form field
      echo $this->blade->render("add_testimonial", [
        'signer' => $this->signer,
      ]);
    }

    public function postAddTestimonialPage()
    {
        $criteria = [
      "title:Testimonial title" => "length:6:32",
      "testimonial:Your testimonial"   => "length:10:255",
      ];

      // validate data...
      $validator = new validator();

          $current_sequential_error = $validator->isValid($criteria);

      // if validation fails, get register page & display error...

      if (strlen($current_sequential_error) > 0)
      {
          $_SESSION['curr_seq_err'] = $current_sequential_error;
          echo $this->blade->render("add_testimonial", [
            'signer' => $this->signer,
          ]);
          unset($_SESSION['curr_seq_err']);
          exit();
      }

      // save testimonial to database
      $testimonial = new Testimonial();
      $testimonial->title = $_POST['title'];
      $testimonial->testimonial = $_POST['testimonial'];
      $testimonial->user_id = LoggedIn::user()->id;
      $testimonial->save();

      header("Location: /testimonial_saved");
      exit();
    }
}
