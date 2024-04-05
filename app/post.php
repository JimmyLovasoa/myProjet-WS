<?php 
	require('../db/connectdb.php');

	$postWs = $_POST['postWs'];
	$user_id = $_GET['user_id'];
	$date_entry = date('Y-m-d');

	$insertPost = $dtb->prepare('INSERT INTO post (
		user_id,
		textPost,
		date_entry
	) VALUES (
		:user_id,
		:textPost,
		:date_entry
	)');

	$insertPost->execute(array(
		'user_id' => $user_id,
		'textPost' => $postWs,
		'date_entry' => $date_entry
	));

	header('location:../home.php');
 ?>