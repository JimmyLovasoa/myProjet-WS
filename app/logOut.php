<?php 
	session_start();

	$_SESSION['mailLog'] = null;
	$_SESSION['passwordLog'] = null;

	$_COOKIE['mailLog'] = null;
	$_COOKIE['passwordLog'] = null;

	header('location:../logIn.php');
 ?>