<?php 
	try {
		$dtb = new PDO('mysql:host=localhost','root','');
		$dtb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e) {
		die('Incorrect connexion :'. $e->getMessage());
	}
	
	$creationdb = ("CREATE DATABASE ws_project");
	
	$dtb->exec($creationdb);

	$dtb = new PDO('mysql:host=localhost;dbname=ws_project','root','');
	$dtb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$tbtInsc = ('CREATE TABLE inscription(
		id INT AUTO_INCREMENT PRIMARY KEY,
		nameInsc VARCHAR(50),
		mailInsc VARCHAR(50),
		passwordInsc VARCHAR(50)
	)');

	$dtb->exec($tbtInsc);

	$tblPost = ('CREATE TABLE post(
		id INT AUTO_INCREMENT PRIMARY KEY,
		user_id INT,
		textPost TEXT,
		photoPost VARCHAR(100),
		videoPost VARCHAR(100),
		date_entry date
	)');

	$dtb->exec($tblPost);

	$tblComm = ('CREATE TABLE commentaire(
		id INT AUTO_INCREMENT PRIMARY KEY,
		user_id INT,
		post_id INT,
		textComm VARCHAR(100),
		date_entry datetime
	)');

	$dtb->exec($tblComm);

	$defaultUser = $dtb->prepare('INSERT INTO inscription(
		nameInsc,
		mailInsc,
		passwordInsc
	) VALUES ( 
		"Utilisateur WS",
		"ws@gmail.com",
		"ws1234"
	)');
	
	$defaultUser->execute();

	$user_id = 1;
	$textPost = "Nous vous souhaitons le bienvenue.";
	$date_entry = date('Y-m-d');
	$defaultPost = $dtb->prepare('INSERT INTO post(
		user_id,
		textPost,
		date_entry
	) VALUES ( 
		:user_id,
		:textPost,
		:date_entry
	)');
	
	$defaultPost->execute(array(
		'user_id' => $user_id,
		'textPost' => $textPost,
		'date_entry' => $date_entry
	));

	header('location: ../login.php');
 ?>	