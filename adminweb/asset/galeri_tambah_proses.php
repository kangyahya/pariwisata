<?php
include "../../konfig/config.php";
include "../../konfig/image_upload.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
    UploadGaleri($nama_file);
	mysql_query("INSERT INTO galeri
				(nama_galeri,tanggal_galeri, id_album)
				VALUES
				(	'$nama_file',
					'$tanggal',
					'$_POST[id_album]')");
header('location:../index.php?page=galeri_foto');

?>