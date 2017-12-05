<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class View extends EX_Controller
{
    public function index()
    {
        $data = array(
           'title' => 'Chào mừng các bạn đến với freetuts.net'
        );

        // Load view
        $this->view->load('view', $data);
    }
}
