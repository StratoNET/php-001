<?php
namespace Udemy\controllers;

use Udemy\models\page;

class PageController extends BaseController
{
    public function getHomePage()
    {
      echo $this->blade->render('home');
    }

    public function getPage()
    {
      $title = "";
      $content = "";

    // extract required page name from requested url
      $uri = explode("/", $_SERVER['REQUEST_URI']);
      $target = $uri[1];  // not [0], as this would be empty

    // find matching page in database
      $page = Page::where('slug', '=', $target)->get();

    // look up page content
      foreach ($page as $item) {
        $title = $item->title;
        $content = $item->content;
      }

      if (strlen($title) == 0) {
        header("Location: /page_not_found");
        exit();
      }

    // pass content to appropriate blade template and render
      echo $this->blade->render('generic_page', [
        'title' => $title,
        'content' => $content
      ]);
    }

    public function get404() {
      header("HTTP/1.0 404 Not Found");
      echo $this->blade->render('page_not_found');
    }
}
