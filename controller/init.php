<?php
// Require các thư viện PHP
require_once 'Session.php';
require_once 'Function.php';
require_once 'DB.php';

//Khai bao dia chi
$path = '/tkb'; // Đồng thời thay đổi địa chỉ path trong file DB.php cùng thư mục
$_DOMAINS = 'http://'.$_SERVER['HTTP_HOST'].$path.'/';

// Khởi tạo session
$session = new Session();
$session->start();

// Kiểm tra session

if ($session->get() != '')
{
    $user = $session->get();
}
else
{
    $user = '';
}

// Nếu đăng nhập

if ($user)
{
    // Lấy dữ liệu tài khoản
      $data_user = $dbuser;
}

?>
