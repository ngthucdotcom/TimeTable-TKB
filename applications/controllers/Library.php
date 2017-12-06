<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Library extends EX_Controller
{
    public function index()
    {
        // Tạo mới thư viện
       $this->library->load('upload');

       // Gọi đến phương thức upload
       $this->library->upload->view_upload();
    }
}
