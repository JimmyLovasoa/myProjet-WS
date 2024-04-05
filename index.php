<!DOCTYPE html>
<html>
<head>
	<?php
		//require('./db/session.php');
		require('./src/head.php');
		require ('./db/connectdb.php');
	?>
	<title>Log-Out</title>
</head>
<body>
	<div class="col-lg-12 pt-14">
		<!-- ////////////////////////////////////////////////////// -->

		<?php require('./src/topbar.php'); ?>

		<!-- ////////////////////////////////////////////////////// -->
		<br>
		<div class="col-lg-5 col-sm-11 col-xs-12 rounded-lg bg-[#ead71c]" style="margin: auto;">
			<div class="col-lg-12 p-3" style="text-align: center; font-size: 20px;">
				<b>S'inscrire</b>
			</div>
			<div class="col-lg-12 p-3">

<form class="form" action="./app/creat.user.php" method="post">
				<input class="border-1 border-black rounded-lg w-full my-2" type="text" id="nameInsc" name="nameInsc" placeholder="Entrez vos noms"><br>
				<input class="border-1 border-black rounded-lg w-full my-2" type="email" id="mailInsc" name="mailInsc" placeholder="Votre adresse mail"><br>
				<input class="border-1 border-black rounded-lg w-full my-2" type="password" id="passInsc" name="passwordInsc" placeholder="Nouveau mot de passe" min="6">
				<em>Tapez au moins 6 caractères.</em><br><br>
				<input class="border-1 border-black rounded-lg w-full my-2" type="password" id="confirmeInsc" name="confirmeInsc" placeholder="Confirmez le mot de passe" min="6"><br>

				<button class="rounded-lg w-full bg-slate-800 text-white p-2 my-2" id="sbmtInsc" type="submit"><b>S'inscrire</b></button>
</form>

				<a href="./login.php"><button class="rounded-lg w-full bg-slate-100 p-2 my-2"><b>J'ai déjà un compte</b></button></a>
			</div>

		</div>

		<!-- ////////////////////////////////////////////////////// -->
	</div>
</body>
</html>

<style type="text/css">
	#sbmtInsc{
		pointer-events: none;
	}
	#nameInsc,#mailInsc,#passInsc,#confirmeInsc{
		outline: none;
	}

</style>

<script>
		$(document).ready(function(){

			$('#confirmeInsc').keyup(function(){
				
				var	nameInsc = $('#nameInsc').val();
				var	mailInsc = $('#mailInsc').val();
				var	passInsc = $('#passInsc').val();
				var	confirmeInsc = $('#confirmeInsc').val();

				if(nameInsc!="" || mailInsc!="" || passInsc!="" || confirmeInsc!=""){
					
					if(confirmeInsc != passInsc) {
					
					$('#confirmeInsc').attr('class','bg-red-200 border-2 border-black rounded-lg w-full my-2');
					
					}else if(confirmeInsc == passInsc) {
					
						$('#confirmeInsc').attr('class','border-2 border-black rounded-lg w-full my-2');
					
						$('#sbmtInsc').css({'pointer-events': 'auto'});
					
					}
				}else{
					$('#sbmtInsc').css({'pointer-events': 'none'});
				} 
			});

			
			/*-----------------------------------------------------------------------------*/
		});
</script>

<script type="text/javascript">
	const formEl = document.querySelector('.form');

	formEl.addEventListener('submit', event => {
		event.preventDefault();

		const formData = new FormData(formEl);
		const data = Object.formEntries(formData);

		fetch('https://reqres.in/api/users', {
			method: 'POST',
			headers: {
				'Content-Type': 'db/json'
			},
			body: JSON.stringify(data)
		});
	});
	.then(res => res.json());
	.then(data => console.log(data));
	.catch(error => console.log(error));

</script>