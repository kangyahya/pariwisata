		<div class="logo">
			<a href="" target="_blank"><img src="images/logo.png"></a>
		</div>
		
		<?php 
		
		$userlink=mysql_query("SELECT * FROM admin WHERE username='$_SESSION[admin]'");
		$datauser=mysql_fetch_array($userlink);
		?>
		<div class="front">
		
		</div>
		
		<div id="admin">
		<?php
		if ($_SESSION['leveluser']== 'Super Admin'){
		?>
		Selamat Datang, <a href="<?php echo "index.php?pilih=edit&id=$datauser[id_admin]"; ?>" title="Profil Saya"><?php echo "$_SESSION[namalengkap]";?></a>
		<?php }
		else { ?>
		Selamat Datang, <a href="<?php echo "admin.php"; ?>" title="Profil Saya"><?php echo "$_SESSION[namalengkap]";?></a>
		<?php } ?>| <a href='logout.php' onClick="return confirm ('Apakah anda benar-benar akan keluar dari sistem?')" title='Log out'>Logout</a>
		</div>
		
		<div class="clear"></div>