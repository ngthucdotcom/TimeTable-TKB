<?php
// // Require database & thông tin chung
// require_once 'init.php';
require_once 'Function.php';

// //Chèn header
include("main.php");
//
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
