<?php
if (file_exists('installer.php')) {
  // unlink('installer.php');
}

// Require default
require_once 'controller/init.php';

//Chèn header
include 'public/header.php';

//Xac dinh user
if ($user)
{
  // admin bar
  include 'view/admin_bar.php';

  // list subject
  if (isset($_GET['controller'])) {
    if ($_GET['controller'] == 'listsubject') {
      include 'view/listsubject.php';
    }
  } else {
    // default page
    include 'view/main.php';
  }
} else {
  // default page
  include 'view/main.php';
}

//Insert action i/o
include 'controller/action_io.php';

// Insert modals
include 'view/modals.php';

//Chèn footer
include 'public/footer.php';

?>
