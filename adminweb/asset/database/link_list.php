<?php 
include "../../../konfig/config.php";
include "../../../konfig/image_upload.php";

$page = $_GET['page'];
$untukdi = $_GET['untukdi'];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

if ($page=='links'&$untukdi=='tambah') {
	mysql_query("INSERT INTO linklist(nama, link) VALUES ('$_POST[nama_link]','$_POST[link]')");
	header('location:../../link_list.php');
}elseif ($page=='links'&$untukdi=='hapus') {
	$id = $_GET['id'];
	mysql_query("DELETE FROM linklist WHERE id=$id");
	header("location:../../link_list.php");
}elseif ($page=='links'&$untukdi=='edit') {
	mysql_query("UPDATE linklist SET nama = '$_POST[nama_link]',  link = '$_POST[link]' WHERE id = '$_POST[ids]'");
	header("location:../../link_list.php");
}else{
	echo "masih kosong";
}
?>