<?php

	/* CONNECT DATABASE */
	try {
		$dtb = new PDO('mysql:host=localhost;dbname=ws_project','root','');
		$dtb -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e) {
		die(header('location:./db/creatdb.php'). $e->getMessage());
	}

?>