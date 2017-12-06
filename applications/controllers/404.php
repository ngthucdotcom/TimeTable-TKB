<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class 404_error extends Base_Controller
{
    public function index()
    {
      $this->load_header();
      $this->view->load('404');
      $this->load_footer();
    }
}
