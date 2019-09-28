<?php
include "../../konfig/config.php";
include "../../konfig/image_upload.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal = date ("Y-m-d");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
UploadAlbum($nama_file);
	mysql_query("INSERT INTO album_galeri
				(nama_album,tanggal_album, deskripsi_album, foto_album)
				VALUES
				(	'$_POST[nama_album]',
					'$tanggal',
					'$_POST[deskripsi]',
					'$nama_file')");
header('location:../index.php?page=album_galeri');
?>