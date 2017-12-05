<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class News extends EX_Controller
{
    public function index()
    {
        // Lấy config có key là csrf_token_name
        echo '<h3>Token: csrf_token_name: ' . $this->config->item('csrf_token_name') . '</h3>';

        // Thay đổi giá trị cho csrf_token_name
        $this->config->set_item('csrf_token_name', 'new_token');
        echo '<h3>Token: csrf_token_name (changed): ' . $this->config->item('csrf_token_name') . '</h3>';

        // Tạo cấu hình mới tên website_name
        $this->config->set_item('website_name', 'freetuts.net');
        echo '<h3>key website_name: ' . $this->config->item('website_name') . '</h3>';
    }

    public function detail()
    {
        echo '<h1>Detail Action</h1>';
    }
}
