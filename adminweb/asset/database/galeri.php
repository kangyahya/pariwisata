<?php
include "../../../konfig/config.php";
include "../../../konfig/image_upload.php";

$page=$_GET['page'];
$untukdi=$_GET['untukdi'];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

if ($page=='galeri' AND $untukdi=='tambah'){
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
	UploadGaleri($nama_file);
	mysql_query("INSERT INTO galeri
				(nama_galeri,tanggal_galeri, id_album)
				VALUES
				(	'$nama_file',
					'$tanggal',
					'$_POST[id_album]')");
					
	}
	
	header('location:../../galeri_photo.php');
}

elseif ($page=='galeri' AND $untukdi=='edit'){
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$nama_file   = $_FILES['fupload']['name'];
	if (!empty($lokasi_file)){
	UploadGaleri($nama_file);
	mysql_query("UPDATE galeri SET 	nama_galeri ='$nama_file',
									tanggal_galeri ='$tanggal',
									id_album ='$_POST[id_album]'
									WHERE id_galeri ='$_POST[id]'");
							}
	else {
	mysql_query("UPDATE galeri SET 	tanggal_galeri ='$tanggal',
									id_album ='$_POST[id_album]'
									WHERE id_galeri ='$_POST[id]'");
	
	}
	header('location:../../galeri_photo.php');
}elseif ($page='galeri' AND $untukdi='hapus') {
	# code...
	$galeridata=mysql_query("SELECT * FROM galeri WHERE id_galeri='$_GET[id]'");
	$r=mysql_fetch_array($galeridata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	mysql_query("DELETE FROM galeri WHERE id_galeri='$_GET[id]'");
	unlink("../../../upload/images/galeri/$r[nama_galeri]");
	}
	else {
	mysql_query("DELETE FROM galeri WHERE id_galeri='$_GET[id]'");
	}
	header("location:../../galeri_photo.php");
}


elseif ($page=='galeri' AND $untukdi=='hapusall'){
	$albumdata=mysql_query("SELECT * FROM album_galeri WHERE id_album='$_GET[id]'");
	$r=mysql_fetch_array($albumdata);
	if ($r[foto_album]!='no_image.jpg'){
	//mysql_query("DELETE FROM album_galeri WHERE id_galeri='$_GET[id]'");
	mysql_query("DELETE FROM galeri WHERE id_album='$_GET[id]'");
	unlink("../../../upload/images/album/$r[foto_album]");
	
	$galeridata=mysql_query("SELECT * FROM galeri WHERE id_album='$_GET[id]'");
	while ($gd=mysql_fetch_array($galeridata)){
	unlink("../../../upload/images/galeri/$gd[nama_galeri]");}
	}
	else {
	mysql_query("DELETE FROM album_galeri WHERE id_album='$_GET[id]'");
	mysql_query("DELETE FROM galeri WHERE id_album='$_GET[id]'");
	$galeridata=mysql_query("SELECT * FROM galeri WHERE id_album='$_GET[id]' AND nama_galeri !='no_image.jpg'");
	while ($gd=mysql_fetch_array($galeridata)){
	unlink("../../../upload/images/galeri/$r[foto_album]");}
	}
	header('location:../../galeri_photo.php');
}

?>