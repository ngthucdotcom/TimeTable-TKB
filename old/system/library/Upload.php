<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Upload
{
    public function __construct()
    {
        echo '<h3>Class Upload được khởi tạo</h3>';
    }

    public function upload()
    {
        echo '<h3>Method Upload được gọi tới</h3>';
    }

    public function view_upload()
    {
        echo '<h3>Method View Upload được gọi tới</h3>';
    }
}
