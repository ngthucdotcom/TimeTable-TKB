<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class User extends EX_Controller
{
    // protected $_data;

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
      // $this->_data['subview'] = 'master/index_view';
      // $this->_data['titlePage'] = 'List All User';
      // $this->_data['contentPage'] = 'Đây là nội dung';
      $data = array(
        'subview' => 'master/index_view',
        'titlePage' => 'List All User',
        'contentPage' => 'Đây là nội dung'
      );
      // Can't using master layout in MVC original 

      // $this->load->view('master/main', $this->_data);
      $this->view->load('master/main', $data);
    }
}
