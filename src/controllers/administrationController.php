<?php
namespace Udemy\controllers;

use Udemy\validation\validator;  /* required, as will NOT inherit from BaseController */
use Udemy\models\page;
use Cocur\Slugify\Slugify;

class AdministrationController extends BaseController
{
    public function postEditedPage()
    {
      $save = true;

      $page_id = $_POST['page_id'];
      $title = $_POST['title'];
      $content = $_POST['editedcontent'];

      if ($page_id == 0) {
        $page = new Page;
      } else {
        $page = Page::find($page_id);
      }

      // generate slug from page title in both cases of new page or re-titled, existing page
      if (($page_id == 0) || ($page->title != $_POST['title'])) {
        $slugify = new Slugify;
        $page->title = $title;
        $page->slug = $slugify->slugify($title, '_');

        // verify slug is not already used in the db/pages table
        $result = Page::where('slug', '=', $page->slug)->get();

        foreach($result as $item) {
            $save = false;
        }
      }

      $page->content = $content;

      if ($save) {
        $page->save();
        echo "Page Saved";
      } else {
        echo "Page title (" . $title . ") is already in use !";
      }
    }

    public function getAddNewPage()
    {
      $page_id = 0;
      $content = "<h4>Please enter your new page content here...</h4>";
      $title = "";

      echo $this->blade->render('generic_page', [
        'page_id' => $page_id,
        'content' => $content,
        'title' => $title,
      ]);
    }
}
