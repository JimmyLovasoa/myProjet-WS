<?php 
	require('../db/connectdb.php');

	$textComm = $_POST['comms'];
	$user_id = $_GET['user_id'];
	$post_id = $_GET['post_id'];
	$date_entry = date('Y-m-d h:i:sa');

	$insertPost = $dtb->prepare('INSERT INTO commentaire(
		user_id,
		post_id,
		textComm,
		date_entry
	) VALUES (
		:user_id,
		:post_id,
		:textComm,
		:date_entry
	)');

	$insertPost->execute(array(
		'user_id' => $user_id,
		'post_id' => $post_id,
		'textComm' => $textComm,
		'date_entry' => $date_entry
	));

	header('location:../home.php');

 ?>