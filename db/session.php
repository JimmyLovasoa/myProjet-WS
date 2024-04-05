<?php
	session_start();
	if (isset($_SESSION['mailLog']) AND isset($_SESSION['passwordLog'])) {
		
		if (!empty($_SESSION['mailLog']) AND !empty($_SESSION['passwordLog'])) {
			
			$mailLog = $_SESSION['mailLog'];
			$passwordLog = $_SESSION['passwordLog'];

		}

	}elseif(empty($mailLog) AND empty($passwordLog)) {
		header('location: ./');
	}

	require('./db/connectdb.php');

	$user = $dtb->query('SELECT * FROM inscription WHERE mailInsc = "'.$mailLog.'" AND passwordInsc="'.$passwordLog.'" limit 1');

		$userId = $user->fetch();
		$user_id = $userId['id'];
		$user_name = $userId['nameInsc'];

 ?>