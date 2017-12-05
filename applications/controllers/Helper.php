<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Helper extends EX_Controller
{
    public function index()
    {
        // Load heloer
        $this->helper->load('string');

        // Gọi đến hàm string_to_int
        echo string_to_int('ngthuc.com');
    }
}
