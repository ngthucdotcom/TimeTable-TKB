<?php
include 'routes.php';
/// Read Method
$db = json_decode(file_get_contents($base_url.'controller/user.json'), TRUE);
$dbuser = $db['user'][0];
$tkb = json_decode(file_get_contents($base_url.'controller/tkbdb.json'), TRUE);
$dbtkb = $tkb['monhoc'];
?>
