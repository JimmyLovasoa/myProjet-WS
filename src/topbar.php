<?php 
	$path = $_SERVER['PHP_SELF'];
	$file = basename ($path);
 ?>
<div class="col-lg-12 container-fluid flex fixed" style="height: 50px; background-color: #ead71c; padding: 5px;z-index: 9; top: 0px;">
	<div class="col-lg-2 text-white">
		
	</div>
	<div class="col-lg-8 col-ms-12 col-xs-12 p-1 flex">
		<div class="col-lg-10">
			<?php 
				if($file == 'home.php') {
					echo $user_name;
				}
			 ?>
			
		</div>
		<div class="col-lg-2 text-right">
			<?php 
				if($file == 'home.php') {
					?>
					<a href="./app/logOut.php"><i class="bi-door-open-fill"></i> Log Out</a>	
					<?php
				}
			 ?>
			
		</div>
	</div>
	<div class="col-lg-2">
		
	</div>
</div>