<?php 
include "../../../konfig/config.php";
include "../../../konfig/image_upload.php";

$page = $_GET['page'];
$untukdi = $_GET['untukdi'];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

if ($page=='kategori'&$untukdi=='tambah') {
	mysql_query("INSERT INTO kategori(judul, link) VALUES ('$_POST[judul]','$_POST[link]')");
	header('location:../../kategori.php');
}elseif ($page=='kategori'&$untukdi=='hapus') {
	$id = $_GET['id'];
	mysql_query("DELETE FROM kategori WHERE kd_kategori=$id");
	header('location:../../kategori.php');
}elseif ($page=='kategori'&$untukdi=='edit') {
	mysql_query("UPDATE kategori SET judul = '$_POST[judul]',  link = '$_POST[link]' WHERE kd_kategori = '$_POST[id]'");
	header("location:../../kategori.php");
}else{
	echo "masih kosong";
}
?>