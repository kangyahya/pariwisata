<?php
include "../../konfig/config.php";
include "../../konfig/image_upload.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal = $_POST['tgl'];
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
UploadAlbum($nama_file);
	mysql_query("UPDATE album_galeri SET nama_album='$_POST[nama_album]',tanggal_album='$tanggal',deskripsi_album='$_POST[deskripsi]', foto_album='$nama_file' where id_album = '$_POST[id_album]'");
header('location:../index.php?page=album_galeri');
?>