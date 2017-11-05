<?php
// Require default
require_once 'init.php';

//Chèn header
include 'header.php';

// Khu vuc xu ly
if (isset($_GET["do"])) {
	// Get Action va trả về kết quả theo ý muốn
      if ($_GET["do"] == "login") {
        // Xu ly dang nhap
          // $uid = $_POST['uid'];
          // $pwd = $_POST['pwd'];

          new Login($_POST['uid'],$_POST['pwd'],$data,$session);
      } else if ($_GET["do"] == "logout") {
        // Xu ly dang xuat
          new Logout('Đăng xuất thành công',$session);
      } else {
          new Danger('index.php','Truy cập bị cấm');
      }
  } else {
      new Danger('index.php','Truy cập bị cấm');
  }
?>
