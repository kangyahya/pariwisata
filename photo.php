<article>
<div class="heading">
<?php 
$nama_album=mysqli_query($con,"SELECT * FROM album_galeri WHERE id_album='$_GET[id]'");
$tampilnama=mysqli_fetch_assoc($nama_album);

$jmlfoto=mysqli_query($con,"SELECT * FROM galeri WHERE id_album='$_GET[id]'");
$hitung=mysqli_num_rows($jmlfoto);
if ($hitung != 0){
?>
	<h2>Foto Album &nbsp; <a href=""><?php echo "<b>$tampilnama[nama_album]</b>"; ?></a>&nbsp;</h2>
</div>
<hr>
	<small><?php echo "$tampilnama[tanggal_album]"; ?></small>
	<p>
		<?php echo "$tampilnama[deskripsi_album]"; ?>
	</p>
	<div id="kecil" style="width: auto;">
	<?php
	/*$galeri=mysqli_query($con,"SELECT * FROM galeri WHERE id_album='$_GET[id]'");*/
	while ($r=mysqli_fetch_assoc($jmlfoto)){
	?>
	<p style="float:left;
		margin:.5em 0;
		margin-right:10px;
		background: #fff;
		border: 1px solid #dcdcdc;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		padding:2px;">

		<a id="thumb1" style="
		display:block;
		float:left;
		width:125px;
		height:90px;
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
		<h2>Tidak ada foto dalam album "&nbsp;<?php echo "$tampilnama[nama_album]";?>&nbsp;"</h3>
		<?php }


		 ?>
</article>