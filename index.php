<?php
// Require default
require_once 'controller/init.php';

//Chèn header
include 'public/header.php';

//Xac dinh user
if ($user)
{
  // admin bar
  include 'view/admin_bar.php';
}

// default page
include 'view/main.php';

// Insert modals
include 'view/modals.php';

//Chèn footer
include 'public/footer.php';

?>
