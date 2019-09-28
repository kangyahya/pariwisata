				<article>
					<div class='heading'>
						<h2>Album Galeri<a href='index.php?page=galeri'> Info Pariwisata</a></h2>
					</div>
					<div class='content'>
						<div class="lebar" style="width:150px;

						width: auto;
		padding: 15px;
		margin-right: 20px;
		margin-left: 20px;
		float: left;
		background: #fff;
		border: 1px solid #dcdcdc;
		margin-bottom: 20px;
		line-height: 20px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;

						">
							<?php
								$album = mysqli_query($con,"SELECT * FROM album_galeri ORDER BY id_album DESC");
								$cek_album = mysqli_num_rows($album);
								/*$poto=mysql_query("SELECT * FROM album_galeri ORDER BY id_album DESC LIMIT 4");
								$hitungfoto=mysql_num_rows($poto);*/
			
									if( $cek_album > 0){
									while($ph=mysqli_fetch_assoc($album)){
										$jmlphoto = mysqli_query($con,"SELECT * FROM galeri WHERE id_album = '$ph[id_album]'");
										$hitung = mysqli_num_rows($jmlphoto);

										if($hitung > 0){
							?>
							<div style="
			padding: 2px;
			width: 123px;
			height: 220px;
			background: #f4f4f4;
			border: 1px solid #dcdcdc;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			float: left;
			margin: 20px 10px 0 0;
			text-align: center;">
			<p class="thumb" style="
			float:left;
			margin:.5em 0;
			margin-right:10px;
			background: #fff;
			border: 1px solid #dcdcdc;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			padding:2px;

		">
		<a style="
		display:block;
		float:left;
		width:120px;
		height:85px;
		overflow:hidden;
		position:relative;
		z-index:1;
		" href="index.php?page=photo&id=<?php echo "$ph[id_album]";?>">
							<img style="float:left;
		top: -0px;
		left:-0px;
		width: 128px;
		position:absolute;"
							src="upload/images/album/<?php echo "$ph[foto_album]";?>"/></a></p>
							<p><?php echo "$ph[nama_album]"; ?><br>
							<p><small><?php echo "$ph[tanggal_album]"; ?></small>
							<p><?php echo "Jumlah Photo ($hitung)"; ?></p>
							</div>
							<?php }}}else{ ?>
								<b><p class='thumb' style='
			float:left;
			margin:.5em 0;
			margin-right:10px;
			background: #fff;
			border: 1px solid #dcdcdc;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			padding:2px;

		'> Album Kosong</p></b>
							<?php	}?>
						</div>	
					</div>
				</article>