<?php

// Ham dang nhap
namespace app;

class Login
{
    public function __construct($uid = null, $pwd = null, $dbuser, $session, $_DOMAINS)
    {
        if ($uid == $dbuser['id'] || $uid == $dbuser['user'] || $uid == $dbuser['email']) {
            if ($pwd == $dbuser['pwd']) {
                // Luu session
                $session->send($uid);
                new Success($_DOMAINS, 'Đăng nhập thành công!');
            } else new Warning('', 'Đăng nhập thất bại');
        } else new Warning('', 'Đăng nhập thất bại');
    }
}

// Ham dang xuat
class Logout
{
    public function __construct($alert = null, $session, $_DOMAINS)
    {
        $session->destroy();
        new Success($_DOMAINS, $alert);
    }
}

// Ham them mon hoc
class addSubject
{
    public function __construct($mon = null, $_DOMAINS)
    {
        if ($mon) {
            $data = json_decode(file_get_contents('app/tkbdb.json'), TRUE);

            unset($_POST["addSubject"]);
            $data["monhoc"] = array_values($data["monhoc"]);
            array_push($data["monhoc"], $_POST);
            file_put_contents('app/tkbdb.json', json_encode($data));

            new Success($_DOMAINS . 'listsubject', 'Thêm môn học thành công!');
        } else new Warning($_DOMAINS . 'listsubject', 'Thêm môn học thất bại');
    }
}

// Ham cap nhat mon hoc
class updateSubject
{
    public function __construct($stt = null, $mon = null, $phong = null, $thu = null, $tietbd = null, $sotiet = null, $nhom = null, $desc = null, $_DOMAINS)
    {
        if ($stt) {
            $all = json_decode(file_get_contents('app/tkbdb.json'), TRUE);
            $jsonfile = $all["monhoc"];
            $jsonfile = $jsonfile[$stt];
            // $jsonfile = $jsonfile[$id];
            $post["TEN_MON"] = isset($_POST["TEN_MON"]) ? $_POST["TEN_MON"] : "";
            $post["PHONG"] = isset($_POST["PHONG"]) ? $_POST["PHONG"] : "";
            $post["THU"] = isset($_POST["THU"]) ? $_POST["THU"] : "";
            $post["TIET_BD"] = isset($_POST["TIET_BD"]) ? $_POST["TIET_BD"] : "";
            $post["SO_TIET"] = isset($_POST["SO_TIET"]) ? $_POST["SO_TIET"] : "";
            $post["NHOM"] = isset($_POST["NHOM"]) ? $_POST["NHOM"] : "";
            $post["DESC"] = isset($_POST["DESC"]) ? $_POST["DESC"] : "";

            if ($jsonfile) {
                unset($all["monhoc"][$stt]);
                $all["monhoc"][$stt] = $post;
                $all["monhoc"] = array_values($all["monhoc"]);
                // unset($all[$id]);
                // $all['monhoc'][$stt] = $post;
                // $all['monhoc'] = array_values($all);
                file_put_contents('app/tkbdb.json', json_encode($all));
            }
            new Success($_DOMAINS . 'listsubject', 'Cập nhật môn học thành công!');
        } else new Warning($_DOMAINS . 'listsubject', 'Cập nhật môn học thất bại');
    }
}

// Ham xoa mon hoc
class deleteSubject
{
    public function __construct($stt = null, $_DOMAINS)
    {
        if ($stt) {
            $all = json_decode(file_get_contents('app/tkbdb.json'), TRUE);
            $jsonfile = $all["monhoc"];
            $jsonfile = $jsonfile[$stt];

            if ($jsonfile) {
                unset($all["monhoc"][$stt]);
                $all["monhoc"] = array_values($all["monhoc"]);
                file_put_contents('app/tkbdb.json', json_encode($all));
            }
            new Success($_DOMAINS . 'listsubject', 'Xóa môn học thành công!');
        } else new Warning($_DOMAINS . 'listsubject', 'Xóa môn học thất bại');
    }
}

// Ham cap nhat thong tin
class updateInfo
{
    public function __construct($id = null, $user = null, $pwd = null, $email = null, $name = null, $analytics = null, $slogan = null, $_DOMAINS)
    {
        if ($id) {
            $all = json_decode(file_get_contents('app/user.json'), TRUE);
            $jsonfile = $all['user'][0];
            // $jsonfile = $jsonfile[$id];
            $post["id"] = isset($_POST["id"]) ? $_POST["id"] : "";
            $post["user"] = isset($_POST["user"]) ? $_POST["user"] : "";
            $post["pwd"] = isset($_POST["pwd"]) ? $_POST["pwd"] : "";
            $post["email"] = isset($_POST["email"]) ? $_POST["email"] : "";
            $post["name"] = isset($_POST["name"]) ? $_POST["name"] : "";
            $post["analytics"] = isset($_POST["analytics"]) ? $_POST["analytics"] : "";
            $post["slogan"] = isset($_POST["slogan"]) ? $_POST["slogan"] : "";

            if ($jsonfile) {
                // unset($all[$id]);
                $all['user'] = $post;
                $all['user'] = array_values($all);
                file_put_contents('app/user.json', json_encode($all));
            }
            new Success($_DOMAINS, 'Cập nhật thông tin thành công!');
        } else new Warning($_DOMAINS, 'Cập nhật thông tin thất bại');
    }
}

// Hàm điều hướng trang
class Redirect
{
    public function __construct($url = null)
    {
        if ($url) {
            echo '<script>location.href="' . $url . '";</script>';
        }
    }
}

// Hàm làm mới trang
class Reload
{
    public function __construct($url = null, $time = null)
    {
        if ($url) {
            if ($time) {
                echo '<script type="text/javascript">
            setTimeout(function () {
               window.location.href = "' . $url . '"; //will redirect to your blog page (an ex: blog.html)
            }, ' . $time . '000); //will call the function after $time secs.
            </script>';
            } else {
                echo '<script type="text/javascript">
              setTimeout(function () {
                 window.location.href = "' . $url . '"; //will redirect to your blog page (an ex: blog.html)
              }, 2000); //will call the function after 2 secs.
              </script>';
            }
        }
    }
}

// Hàm thông báo công việc thành công
class Success
{
    public function __construct($url = null, $alert = null)
    {
        if ($url) {
            if ($alert) {
                echo '<div class="alert alert-success">' . $alert . '</div>
              <script type="text/javascript">
              setTimeout(function () {
                 window.location.href = "' . $url . '"; //will redirect to your blog page (an ex: blog.html)
              }, 2000); //will call the function after 2 secs.
              </script>';
            } else echo '<div class="alert alert-success">Thành công</div>
            <script type="text/javascript">
            setTimeout(function () {
               window.location.href = "' . $url . '"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
            </script>';
        } else if ($alert) {
            echo '<div class="alert alert-success" id="Success">' . $alert . '</div>
          <script type="text/javascript">' . "
          setTimeout(function() {
              $('#Success').fadeOut(2000);
          }, 2000);
          </script>";
        } else echo '<div class="alert alert-success" id="Success">Thành công</div>
          <script type="text/javascript">' . "
          setTimeout(function() {
              $('#Success').fadeOut(2000);
          }, 2000);
          </script>";
    }
}

// Hàm cảnh báo một việc làm nào đó
class Warning
{
    public function __construct($url = null, $alert = null)
    {
        if ($url) {
            if ($alert) {
                echo '<div class="alert alert-warning">' . $alert . '</div>
              <script type="text/javascript">
              setTimeout(function () {
                 window.location.href = "' . $url . '"; //will redirect to your blog page (an ex: blog.html)
              }, 2000); //will call the function after 2 secs.
              </script>';
            } else echo '<div class="alert alert-warning">Cảnh báo</div>
            <script type="text/javascript">
            setTimeout(function () {
               window.location.href = "' . $url . '"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
            </script>';
        } else if ($alert) {
            echo '<div class="alert alert-warning" id="warning">' . $alert . '</div>
          <script type="text/javascript">' . "
          setTimeout(function() {
              $('#warning').fadeOut(2000);
          }, 2000);
          </script>";
        } else echo '<div class="alert alert-warning" id="warning">Cảnh báo</div>
          <script type="text/javascript">' . "
          setTimeout(function() {
              $('#warning').fadeOut(2000);
          }, 2000);
          </script>";
    }
}

// Hàm cảnh báo nguy hiểm
class Danger
{
    public function __construct($url = null, $alert = null)
    {
        if ($url) {
            if ($alert) {
                echo '<div class="alert alert-danger">' . $alert . '</div>
              <script type="text/javascript">
              setTimeout(function () {
                 window.location.href = "' . $url . '"; //will redirect to your blog page (an ex: blog.html)
              }, 2000); //will call the function after 2 secs.
              </script>';
            } else echo '<div class="alert alert-danger">Nguy hiểm</div>
            <script type="text/javascript">
            setTimeout(function () {
               window.location.href = "' . $url . '"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
            </script>';
        } else if ($alert) {
            echo '<div class="alert alert-danger" id="danger">' . $alert . '</div>
          <script type="text/javascript">' . "
          setTimeout(function() {
              $('#danger').fadeOut(2000);
          }, 2000);
          </script>";
        } else echo '<div class="alert alert-danger" id="danger">Nguy hiểm</div>
          <script type="text/javascript">' . "
          setTimeout(function() {
              $('#danger').fadeOut(2000);
          }, 2000);
          </script>";
    }
}

// Hàm thông báo một mẩu tin
class Info
{
    public function __construct($url = null, $alert = null)
    {
        if ($url) {
            if ($alert) {
                echo '<div class="alert alert-info">' . $alert . '</div>
              <script type="text/javascript">
              setTimeout(function () {
                 window.location.href = "' . $url . '"; //will redirect to your blog page (an ex: blog.html)
              }, 2000); //will call the function after 2 secs.
              </script>';
            } else echo '<div class="alert alert-info">Thông tin</div>
            <script type="text/javascript">
            setTimeout(function () {
               window.location.href = "' . $url . '"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
            </script>';
        } else if ($alert) {
            echo '<div class="alert alert-info" id="info">' . $alert . '</div>
          <script type="text/javascript">' . "
          setTimeout(function() {
              $('#info').fadeOut(2000);
          }, 2000);
          </script>";
        } else echo '<div class="alert alert-info" id="info">Thông tin</div>
          <script type="text/javascript">' . "
          setTimeout(function() {
              $('#info').fadeOut(2000);
          }, 2000);
          </script>";
    }
}

// Hàm mã hóa
// class Hash_Encrypt {
//     public function __construct($text = null) {
//         if ($text)
//         {
//             $key = "7f954d00890af2c2c954d00890af2c21b17d6489c15e5be712fff271b1715e5be712fff271b17d6489";
//             $hsh = $key.$text.$key;
//             return $hsh;
//             // echo md5($hsh);
//         }
//     }
// }

// //Encrypt
// Function Hash_Encrypt($text) {
//   if ($text)
//   {
//       $key = "7f954d00890af2c2c954d00890af2c21b17d6489c15e5be712fff271b1715e5be712fff271b17d6489";
//       $hsh = $key.$text.$key;
//       return md5($hsh);
//   }
// }
//
// //Get day
// Function get_day($day,$month,$year) {
//   $month_array_365 = array('1' => 31,
//   '2' => 28,
//   '3' => 31,
//   '4' => 30,
//   '5' => 31,
//   '6' => 30,
//   '7' => 31,
//   '8' => 31,
//   '9' => 30,
//   '10' => 31,
//   '11' => 30,
//   '12' => 31,
//   );
//   $month_array_366 = array('1' => 31,
//   '2' => 29,
//   '3' => 31,
//   '4' => 30,
//   '5' => 31,
//   '6' => 30,
//   '7' => 31,
//   '8' => 31,
//   '9' => 30,
//   '10' => 31,
//   '11' => 30,
//   '12' => 31,
//   );
//   if ($year%4 == 0) {
//     $year = 366;
//     $get_day_of_month = $month_array_366;
//   } else {
//     $year = 365;
//     $get_day_of_month = $month_array_365;
//   }
//   $day_of_months = 0;
//   for ($i=1; $i < $month; $i++) {
//     $get_days = $get_day_of_month[$i];
//     $day_of_months = $day_of_months + $get_days;
//   }
//   return $year + $day_of_months + $day;
// }
//
// //Get date
// Function get_day_on_date($date) {
//   return substr($date, 8, 2);
// }
//
// Function get_month_on_date($date) {
//   return substr($date, 5, 2);
// }
//
// Function get_year_on_date($date) {
//   return substr($date, 0, 4);
// }
//
// //date minus date
// Function date_to_date($date_before,$date_after) {
//   $day_of_date1 = get_day(get_day_on_date($date_before),get_month_on_date($date_before),get_year_on_date($date_before));
//
//   $day_of_date2 = get_day(get_day_on_date($date_after),get_month_on_date($date_after),get_year_on_date($date_after));
//
//   return $day_of_date2 - $day_of_date1;
// }
//
// //day limit
// Function day_limit($date_before,$date_after,$limit) {
//   $recent = date_to_date($date_before,$date_after);
//
//   return ($recent <= $limit) ? 1 : 0;//1 -> còn hạn <--> 0 -> quá hạn
// }

//Hàm phân quyền
// function role($roleUser) {
//   if (isset($_GET['action'])) {
//     if ($_GET['action'] == 'admin') {
//       if (isset($_GET['tab'])){
//         $area = $_GET['tab'];
//
//       }
//     } else $area = $_GET['action'];
//   }
// 	if( in_array("fullcontrol",$roleUser)) { //|| in_array('device',$roleUser)
//     new Success('','Bạn có quyền truy cập!');
//   } else new Warning('','Bạn không có quyền truy cập!');
// }
// class Role {
//     public function __construct($roleUser = null) {
//         if (isset($_GET['action'])) {
//           if ($_GET['action'] == 'admin') {
//             $area = $_GET['action'];
//             if (isset($_GET['tab'])){
//               $area = $_GET['tab'];
//             }
//           } else $area = $_GET['action'];
//         }
//       	if( in_array("fullcontrol",$roleUser) || in_array($area,$roleUser)) {
//           // new Success('','Bạn có quyền truy cập!');
//         } else new Redirect('http://192.168.0.103/demo_ptycpm/');
//     }
// }
//
// function requestRole($roleUser,$request) {
//       	return ( in_array("fullcontrol",$roleUser) || in_array($request,$roleUser)) ? 1 : 0;
//       }
?>
