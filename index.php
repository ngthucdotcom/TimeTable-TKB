<?php
// Require default
require_once 'init.php';

//Chèn header
include 'header.php';

//Xac dinh user
if ($user)
{
  // admin bar
  include 'admin_bar.php';
}

// default page
include("main.php");

//Chèn footer
include 'footer.php';

?>
