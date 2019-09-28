<?php 
include "../../../konfig/config.php";
include "../../../konfig/image_upload.php";

$page = $_GET['page'];
$untukdi = $_GET['untukdi'];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];

if ($page=='komentar'&$untukdi=='edit') {
	
}elseif ($page=='komentar'&$untukdi=='hapus') {
	$id = $_GET['id'];
	mysql_query("DELETE FROM komentar_artikel where kd_komartikel=$id");
	header("location : komentar.php");
}elseif ($page=='komentar'&$untukdi=='terima') {
	$id = $_GET['id']; 
	$terima = mysql_query("UPDATE komentar_artikel set status='1' where kd_komartikel=$id");
	header("location:../../komentar.php");
}elseif ($page=='komentar'&$untukdi=='tolak') {
	$id = $_GET['id']; 
	$terima = mysql_query("UPDATE komentar_artikel set status='0' where kd_komartikel=$id");
	header("location:../../komentar.php");
}else{
	echo "masih kosong";
}
?>