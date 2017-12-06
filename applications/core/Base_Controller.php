<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Base_Controller extends EX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function load_header()
    {
        // Load nội dung header
        $this->view->load('base/header');
    }

    public function load_footer()
    {
        // Load nội dung footer
        $this->view->load('base/footer');
    }
}
