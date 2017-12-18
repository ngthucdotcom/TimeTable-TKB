<?php
// Insert data array
$path = '/tkb';

$dbuser = json_decode(file_get_contents('http://'.$_SERVER['HTTP_HOST'].$path.'/user.json'), TRUE);

$dbtkb = json_decode(file_get_contents('http://'.$_SERVER['HTTP_HOST'].$path.'/tkbdb.json'), TRUE);
?>
