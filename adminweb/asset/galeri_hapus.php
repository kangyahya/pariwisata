<?php
$galeridata=mysql_query("SELECT * FROM galeri WHERE id_galeri='$_GET[id]'");
	$r=mysql_fetch_array($galeridata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	mysql_query("DELETE FROM galeri WHERE id_galeri='$_GET[id]'");
	unlink("../../upload/images/galeri/$r[nama_galeri]");
	}
	else {
	mysql_query("DELETE FROM galeri WHERE id_galeri='$_GET[id]'");
	}
	header('location:index.php?page=galeri_foto');
?>