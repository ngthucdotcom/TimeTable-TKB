<?php

// Đường dẫn tới hệ  thống
define('PATH_SYSTEM', __DIR__ .'/system');
define('PATH_APPLICATION', __DIR__ . '/admin');

// Lấy thông số cấu hình
require (PATH_SYSTEM . '/config/config.php');

// Danh sách tham số gồm hai phần
//  - controller: controller hiện tại
//  - action: action hiện tại
$segments = array(
    'controller'    => '',
    'action'        => array()
);

// Nếu không truyền controller thì lấy controller mặc định
$segments['controller'] = empty($_GET['controller']) ? CONTROLLER_DEFAULT : $_GET['controller'];

// Nếu không truyền action thì lấy action mặc định
$segments['action'] = empty($_GET['action']) ? ACTION_DEFAULT : $_GET['action'];

// Require controller
require_once PATH_SYSTEM . '/core/EX_Controller.php';

// Chạy controller
$controller = new EX_Controller();
$controller->load($segments['controller'], $segments['action']);
