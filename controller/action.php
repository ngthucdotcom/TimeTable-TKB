<?php
$path = '/tkb';
$dbtkb = json_decode(file_get_contents('http://'.$_SERVER['HTTP_HOST'].$path.'/tkbdb.json'), TRUE);

$tenmon = $_POST['tenmon'];

foreach ($dbtkb as $mon){
	if ($tenmon==$mon['TEN_MON']){
		echo json_encode($mon);
	}
}

?>
