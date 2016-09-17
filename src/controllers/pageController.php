<?php
namespace Udemy\controllers;

class PageController extends BaseController
{
    public function getHomePage()
    {
      echo $this->blade->render("home");
    }

    public function getPage()
    {
      echo "This is a generic page";
    }
}
