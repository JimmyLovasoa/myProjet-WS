<?php 
	session_start();
	require ('./db/connectdb.php');

	if ((isset($_COOKIE['mailLog']) and isset($_COOKIE['passwordLog'])) AND (!empty($_COOKIE['mailLog']) and !empty($_COOKIE['passwordLog']))) {

			$_SESSION['mailLog'] = $_COOKIE['mailLog'];
			$_SESSION['passwordLog'] = $_COOKIE['passwordLog'];
				
	}
	
	if(isset($_SESSION['mailLog']) AND isset($_SESSION['passwordLog'])) {

		if(!empty($_SESSION['mailLog']) AND !empty($_SESSION['passwordLog'])) {

			header('location:./home.php');

		}
	}

		if(!empty($_POST)) {

			if (isset($_POST['mailLog']) and isset($_POST['passwordLog'])) {
				
				$mailLog = $_POST['mailLog'];
				$passwordLog = $_POST['passwordLog'];

			$req = $dtb->query("SELECT * FROM inscription WHERE mailInsc='".$mailLog."' AND passwordInsc='".$passwordLog."' limit 1");

				if($req->rowCount() > 0){
					
					$req = $req->fetch();
					$_SESSION['mailLog'] = $mailLog;
					$_SESSION['passwordLog'] = $passwordLog;

				header('location: ./home.php');

				} else {
					header('location: ../');
				}
			}
		}
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php require('./src/head.php'); ?>	
	<title>Log-In</title>
</head>
<body>
		<div class="col-lg-12 pt-14">
		<!-- ////////////////////////////////////////////////////// -->

		<?php require('./src/topbar.php'); ?>

		<!-- ////////////////////////////////////////////////////// -->
		<br>
		<div class="col-lg-5 col-sm-11 col-xs-12 rounded-lg bg-[#ead71c]" style="margin: auto;">
			<div class="col-lg-12 p-3" style="text-align: center; font-size: 20px;">
				<b>Se connecter</b>
			</div>
			<div class="col-lg-12 p-3">

<form class="form" action="" method="post">
				<input class="border-1 border-black rounded-lg w-full my-2" type="email" id="mailLog" name="mailLog" placeholder="Votre adresse mail"><br>
				<input class="border-1 border-black rounded-lg w-full my-2" type="password" id="passLog" name="passwordLog" placeholder="Mot de passe" min="6">
				<em><a href="">Mot de passe oublié ?</a></em>
				<button class="rounded-lg w-full bg-slate-800 text-white p-2 my-4" id="sbmtInsc" type="submit"><b>Se connecter</b></button>
</form>

				<em><a href="./">Créer un nouveau compte.</a></em>
			</div>

		</div>

		<!-- ////////////////////////////////////////////////////// -->
	</div>
</body>
</html>