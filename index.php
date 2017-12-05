<?php // Boostrap MVC

// Đường dẫn tới hệ  thống
define('PATH_SYSTEM', __DIR__ .'/system');
define('PATH_APPLICATION', __DIR__ . '/applications');

// Lấy thông số cấu hình
require (PATH_SYSTEM . '/config/config.php');

//mở file EX_Common.php, file này chứa hàm EX_Load() chạy hệ thống
include_once PATH_SYSTEM . '/core/EX_Common.php';

// Chương trình chính
EX_load();
