<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Index extends Base_Controller
{
    public function index()
    {
      $this->load_header();
      $this->view->load('product');
      $this->load_footer();
    }
}
