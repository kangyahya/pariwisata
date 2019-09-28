<?php
include "../../../konfig/config.php";
include "../../../konfig/image_upload.php";

$page=$_GET[page];
$untukdi=$_GET[untukdi];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
if ($page=='album' AND $untukdi=='tambah'){
	if (!empty($lokasi_file)){
	UploadAlbum($nama_file);
	mysql_query("INSERT INTO album_galeri
				(nama_album,tanggal_album, deskripsi_album, foto_album)
				VALUES
				(	'$_POST[nama_album]',
					'$tanggal',
					'$_POST[deskripsi]',
					'$nama_file')");
					}
	else {
	mysql_query("INSERT INTO album_galeri
				(nama_album,tanggal_album, deskripsi_album, foto_album)
				VALUES
				(	'$_POST[nama_album]',
					'$tanggal',
					'$_POST[deskripsi]',
					'no_image.jpg')");
	}
	
	header('location:../../album_galeri.php');
}

elseif ($page=='album' AND $untukdi=='edit'){
	if (!empty($lokasi_file)){
	UploadAlbum($nama_file);
	mysql_query("UPDATE album_galeri SET 	nama_album ='$_POST[nama_album]',
										tanggal_album ='$tanggal',
										deskripsi_album ='$_POST[deskripsi]',
										foto_album ='$nama_file'
										WHERE id_album ='$_POST[id_album]'");
							}
	else {
	mysql_query("UPDATE album_galeri SET 	nama_album ='$_POST[nama_album]',
										tanggal_album ='$tanggal',
										deskripsi_album ='$_POST[deskripsi]'
										WHERE id_album ='$_POST[id_album]'");
	
	}
	header('location:../../album_galeri.php');
}


elseif ($page=='album' AND $untukdi=='hapus'){
	$albumdata=mysql_query("SELECT * FROM album_galeri WHERE id_album='$_GET[id]'");
	$r=mysql_fetch_array($albumdata);
	if ($r[foto_album]!='no_image.jpg'){
	mysql_query("DELETE FROM album_galeri WHERE id_album='$_GET[id]'");
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
	header('location:../../album_galeri.php');
}

?>