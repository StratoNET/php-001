<?php
namespace Udemy\controllers;

class PageController extends BaseController
{
    public function getHomePage()
    {
      echo $this->blade->render("home");
    }
}
