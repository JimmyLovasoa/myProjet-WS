<!DOCTYPE html>
<html>
<head>
	<?php
		require('./db/session.php'); 
		require('./src/head.php'); 
		require('./db/connectdb.php');

	?>	
	<title>home</title>
</head>
<body>
	<div class="col-lg-12 bg-slate-200 relative">
		<!-- ////////////////////////////////////////////////////// -->

		<?php require('./src/topbar.php'); ?>

		<!-- ////////////////////////////////////////////////////// -->

		<div class="col-lg-8 col-sm-11 col-xs-11 pt-14" style="margin: auto;">

			<div class="rounded-lg bg-[#fffff] border border-black my-2 p-2 shadow-sm bg-white">
				<form action="./app/post.php?user_id=<?=$user_id?>" method="post">
					<div class="input-group px-2">	  
					  <div class="form-floating h-4">
					    <input name="postWs" type="text" class="border w-full py-2" id="floatingInputGroup1" placeholder="A quoi pensez-vous?" style="height: 38px;">
					  </div>
					  <span class="input-group-text bg-[#ead71c]"><button type="submit">Poster</button></span>
					</div>
				</form>
			</div>			


<?php 
	$posting = $dtb->query('SELECT * FROM post ORDER BY id DESC');

	while ($showPost = $posting->fetch()) {
		$post_id = $showPost['id'];
		
 ?>		
			<div class="rounded-lg bg-[#fffff] border border-black my-2 shadow-sm bg-white">
				<div class="w-full px-3 py-2 border-b"> 
					<i class="bi-person"></i>•
					<b><a href="#"><?php 	
$user = $dtb->query('SELECT * FROM inscription WHERE id = "'.$showPost['user_id'].'"');

	$afficheUser = $user->fetch();
	echo $afficheUser['nameInsc'];

				?></a></b>
					<p class="text-slate-500" style="font-size: 13px; text-indent: 26px;">
					<?= $showPost['date_entry']?></p>
				</div>
				<div class="p-3"> 
					<p style="font-size:30px"><?= $showPost['textPost']?></p>
				</div>
				<div class="p-2 border-t">
<?php 
	$comm = $dtb->query('SELECT * FROM commentaire WHERE post_id = "'.$post_id.'" ORDER BY id DESC');

	while ($showComm = $comm->fetch()) {
		if (!empty($showComm)) {
		
 ?>					
					<div class="p-2 flex">
						<div class="w-1/12 text-center" title="<?php echo $showComm['user_id']?>">
							<i class="bi-person-fill"></i>	
						</div>
						
						<div class="bg-slate-200 px-4 py-1 rounded-lg">
							<p><?=$showComm['textComm']?></p>	
						</div>
						<div class="text-right text-slate-500 px-4">
							<a style="font-size: 11px"><?=$showComm['date_entry']?></a>
						</div>
					</div>
					
<?php
		}
	}
 ?>
				<form action="./app/comm.php?user_id=<?=$user_id?>&post_id=<?=$post_id?>" method="post">
					<div class="input-group px-2">	  
					  <div class="form-floating h-4">
					    <input name="comms" type="text" class="border w-full py-2" id="floatingInputGroup1" placeholder="Commentaire" style="height: 38px;">
					  </div>
					  <span class="input-group-text bg-[#ead71c]"><button type="submit"><i class="bi-send-fill"></i></button></span>
					</div>
				</form>
				</div>
			</div>
<?php 
	}
 ?>
		</div>


	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#sendComm').click(function(){
			var commentaire = $('#commentaire').val();
			
			if(commentaire!='') {
				$('#commResult').text(commentaire);	
			}
			
		});
	});
	
</script>