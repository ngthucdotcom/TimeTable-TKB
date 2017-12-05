<?php
// Require default
require_once 'applications/controllers/init.php';

//Chèn header
include 'applications/views/base/header.php';

//Xac dinh user
if ($user)
{
  // admin bar
  include 'applications/views/admin_bar.php';
}

// default page
include 'applications/views/main.php';

//Insert action i/o
include 'applications/controllers/action_io.php';

// Insert modals
include 'applications/views/modals.php';

//Chèn footer
include 'applications/views/base/footer.php';

?>
