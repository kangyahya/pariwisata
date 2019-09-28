<?php
 include("konfig/config.php");

$tanggal = date ("Y-m-d");
 mysqli_query($con,"INSERT INTO komentar_artikel
 	( nama, email, isi_komentar, tanggal, status, kd_artikel )

 	VALUES (
 	'$_POST[nama]',
 	'$_POST[email]',
 	'$_POST[komentar]',
 	'$tanggal',
 	'0',
 	'$_POST[kd_art]')");
header("location:index.php?page=detartikel&id=$_POST[kd_art]");
?>