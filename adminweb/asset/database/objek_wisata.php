<?php 
include "../../../konfig/config.php";
include "../../../konfig/image_upload.php";

$page = $_GET['page'];
$untukdi = $_GET['untukdi'];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

if ($page=='obwis'&$untukdi=='tambah') {
mysql_query("INSERT INTO markers(nama, alamat, lat, lng, tipe) VALUES ('$_POST[nama]','$_POST[alamat]','$_POST[lat]','$_POST[long]','$_POST[tipe]')");
header('location:../../obwis.php');
} elseif ($page=='obwis'&$untukdi=='edit') {
	mysql_query("UPDATE markers SET nama = '$_POST[nama]',  alamat = '$_POST[alamat]', lat='$_POST[lat]', lng=$_POST[long], tipe = '$_POST[tipe]' WHERE id = '$_POST[id]'");
header('location:../../obwis.php');
} elseif ($page=='obwis'&$untukdi=='hapus') {
	$id = $_GET['id'];
	mysql_query("DELETE FROM markers WHERE id=$id");
	header('location:../../obwis.php');
}else{
	echo "masih kosong";
}
?>