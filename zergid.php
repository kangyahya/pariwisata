<div class="zerogrid">
		<div class="row">
			<section class="col-1-3">
				<div class="heading">About us</div>
				<div class="content">
					Info Pariwisata merupakan Website yang menyediakan info info seputar pariwisata yang ada di Kota Cirebon...
				</div>
			</section>
			<section class="col-1-3">
				<div class="heading">Categories</div>
				<div class="content">
					<ul>
						<?php
							$tampil = mysqli_query($con,"SELECT judul, kd_kategori, link from kategori")or die("Query failed with error: ".mysql_error());
							while ($data = mysqli_fetch_array($tampil)) {
							echo " <li><a href=index.php?page=$data[link]&id=$data[kd_kategori]>$data[judul]</a></li>";
							}

						?>
					</ul>
				</div>
			</section>
			<section class="col-1-3">
				<div class="heading">Gambar Terbaru</div>
				<div style=" background-image: url('images/bg-header.png');">
	<?php
	$galeri=mysqli_query($con,"SELECT * FROM galeri ORDER BY id_galeri DESC LIMIT 4");
	$hit = mysqli_num_rows($galeri);
	if ($hit > 0 ) {
	while ($r=mysqli_fetch_assoc($galeri)){
	?>
	<p style="float:left;
		margin:.5em 0;
		margin-right:10px;
		background: #fff;
		border: 1px solid #dcdcdc;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		padding:1px; ">

		<a id="thumb1" style="
		display:block;
		float:left;
		width:100px;
		height:65px;
		overflow:hidden;
		position:relative;
		z-index:1;
		" href="upload/images/galeri/<?php echo "$r[nama_galeri]";?>" class="highslide" onclick="return hs.expand(this)">
			<img src="upload/images/galeri/<?php echo "$r[nama_galeri]";?>" alt="Highslide JS" title="Klik untuk memperbesar" width="350px"/></a>
	</p>
	<?php
	} ?> 
	</div>
	<?php }else{
		?>
		<h2>Tidak ada foto dalam album "&nbsp;<?php echo "$r[nama_album]";?>&nbsp;"</h3>
		<?php } ?>
			</section>
		</div>
	</div>