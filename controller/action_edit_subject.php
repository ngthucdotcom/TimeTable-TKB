<?php
require 'DB.php';

$mamon = $_POST['mamon'];
$tenmon = $_POST['tenmon'];

foreach ($tkb as $mon){
	if ($mon[$mamon]){
    if ($tenmon==$mon[$mamon]['TEN_MON']){
      echo json_encode($mon);
    }
	}
}

?>
