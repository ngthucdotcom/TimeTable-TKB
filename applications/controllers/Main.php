<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Main extends Base_Controller
{
    public function index()
    {
        $data['monhoc'] = json_decode(file_get_contents('http://localhost/tkb/applications/models/db.json'), true);
        $this->load_header();
        $this->view->load('timetable',$data);
        $this->load_footer();
        // print_r($data);
    }
}
