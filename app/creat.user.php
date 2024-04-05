<?php 
	require ('../db/connectdb.php');

	$nameInsc = $_POST["nameInsc"];
	$mailInsc = $_POST['mailInsc'];
	$passwordInsc = $_POST["passwordInsc"];

	$addUser = array();

	$addUser['nameInsc'] = $nameInsc; 
	$addUser['mailInsc']= $mailInsc;
	$addUser['passwordInsc'] = $passwordInsc; 


$encoded_data = json_encode($addUser, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	file_put_contents('../db/adding.temp.json',$encoded_data);

	require('../app/creat.user.indb.php');
 ?>