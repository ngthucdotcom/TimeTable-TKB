<?php
<<<<<<< HEAD
// Require default
<<<<<<< HEAD
require_once 'applications/controllers/init.php';
=======
// // Require database & thông tin chung
// require_once 'init.php';
require_once 'Function.php';

//Khai bao du lieu
include 'data.php';
>>>>>>> parent of d5dad3e... Add sessions and fix some bugs
=======
require_once 'controller/init.php';
>>>>>>> parent of 1e2235c... Fix bugs 201712060219

//Chèn header
include 'public/header.php';

<<<<<<< HEAD
//Xac dinh user
if ($user)
{
  // admin bar
  include 'view/admin_bar.php';
}
=======
// admin bar
include 'admin_bar.php';
>>>>>>> parent of d5dad3e... Add sessions and fix some bugs

// default page
include 'view/main.php';

//Insert action i/o
include 'controller/action_io.php';

// Insert modals
include 'view/modals.php';

//Chèn footer
include 'public/footer.php';

// //Chèn menu
// include("view/default/menu.php");

// //Controller
// if (isset($_GET["action"])) {
// 	//Get Action va trả về kết quả theo ý muốn
//       if ($_GET["action"] == "tra-cuu") {
//         //Chèn trang Find
//         include("view/find.php");
//       } else if ($_GET["action"] == "ket-qua") {
//         //Chèn trang Result
//         include("view/find_result.php");
//       } else if ($_GET["action"] == "quan-tri") {
//         //Chèn trang Admin
//         include("admin.php");
//       } else if ($_GET["action"] == "dang-xuat") {
//         //Dang xuat khoi tai khoan hien huu
//         include("logout.php");
//       } else {
//         //Chèn trang Find
//         new Redirect($_DOMAIN.'tra-cuu');
//       }
//     } else {
//   //Chèn trang Find
  // new Redirect('main.php');
// }
//
// //Chèn footer
// include("view/default/footer.php");
?>
