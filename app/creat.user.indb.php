<?php 
	$addingData = file_get_contents('../db/adding.temp.json');

	$users = json_decode($addingData, JSON_OBJECT_AS_ARRAY);
	
	$nameInsc = $users['nameInsc'];
	$mailInsc = $users['mailInsc'];
	$passwordInsc = $users['passwordInsc'];

$insert = $dtb->prepare('INSERT INTO inscription(
		nameInsc,
		mailInsc,
		passwordInsc
	) VALUES(
		:nameInsc,
		:mailInsc,
		:passwordInsc
	)');$insert->execute(array(
		'nameInsc' => $nameInsc,
		'mailInsc' => $mailInsc,
		'passwordInsc' => $passwordInsc
	));

	header('location:../login.php');

 ?>