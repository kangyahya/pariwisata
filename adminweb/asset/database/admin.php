<?php 
include "../../../konfig/config.php";
include "../../../konfig/image_upload.php";

$page = $_GET['page'];
$untukdi = $_GET['untukdi'];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

if ($page=='admin'&$untukdi=='tambah') {
	mysql_query("INSERT INTO admin(username, nama_lengkap, email, password, no_hp, alamat) VALUES ('$_POST[username]','$_POST[nama]','$_POST[email]',md5('$_POST[password]'),'$_POST[no_hp]','$_POST[alamat]')");
	header('location:../../admin.php');
}elseif ($page=='admin'&$untukdi=='hapus') {
	$id = $_GET['id'];
	mysql_query("DELETE FROM admin WHERE id_admin=$id");
	header('location:../../admin.php');
}elseif ($page=='admin'&$untukdi=='edit') {

	mysql_query("UPDATE admin SET username = '$_POST[username]',  nama_lengkap = '$_POST[nama]', email = '$_POST[email]', no_hp = '$_POST[no_hp]', alamat = '$_POST[alamat]' WHERE id_admin = '$_POST[id]'");
	header("location:../../admin.php");
}else{
	echo "masih kosong";
}
?>