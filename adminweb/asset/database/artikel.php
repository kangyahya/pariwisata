<?php 
include "../../../konfig/config.php";
include "../../../konfig/image_upload.php";
$page = $_GET['page'];
$untukdi = $_GET['untukdi'];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
if ($page=='artikel'&$untukdi=='tambah') {
if (!empty($nama_file)) {
UploadGambar($nama_file);
	mysql_query("INSERT INTO artikel
				(judul, tgl_artikel, ringkasan, isi, gambar, kd_kategori, penulis, terbit)
				VALUES
				(	'$_POST[judul]',
					'$tanggal',
					'$_POST[isi]',
					'$_POST[isi]',
					'$nama_file',
					'$_POST[kategori]',
					'$_POST[penulis]',
					'1')");
					}
					else{
					UploadGambar($nama_file);
					mysql_query("INSERT INTO artikel
					(judul, tgl_artikel, ringkasan, isi, gambar, kd_kategori, penulis)
					VALUES
				(	'$_POST[judul]',
					'$tanggal',
					'$_POST[isi]',
					'$_POST[isi]',
					'no_image.jpg',
					'$_POST[kategori]',
					'$_POST[penulis]',
					'1')");
						
					}
		header("location:../../artikel.php");	
}elseif ($page=='artikel'&$untukdi=='edit') {
	
	if (!empty($lokasi_file)){
	UploadGambar($nama_file);
	mysql_query("UPDATE artikel SET 	judul ='$_POST[judul]',
										tgl_artikel ='$tanggal',
										ringkasan = '$_POST[isi]',
										isi ='$_POST[isi]',
										gambar ='$nama_file',
										kd_kategori ='$_POST[kategori]',
										penulis = '$_POST[penulis]',
										terbit ='1'
										WHERE kd_artikel = $_POST[id]");
							}
	else {
	mysql_query("UPDATE sh_berita SET 	judul ='$_POST[judul]',
										tgl_artikel ='$tanggal',
										ringkasan = '$_POST[isi]',
										isi ='$_POST[isi]',
										'no_image.jpg',
										kd_kategori ='$_POST[kategori]',
										penulis = '$_POST[penulis]',
										terbit ='1'
										WHERE kd_artikel = '$_POST[id]'");
	
	}
	header("location:../../artikel.php");
}elseif ($page=='artikel'&$untukdi=='hapus') {
	$id = $_GET['id']; 
	mysql_query("DELETE FROM artikel WHERE kd_artikel=$id");
	header("location:../../artikel.php");
}elseif ($page=='artikel'&$untukdi=='hapusgambar') {
	$id = $_GET['id'];
	$beritadata=mysql_query("SELECT * FROM artikel WHERE kd_artikel=$id");
	$r=mysql_fetch_array($beritadata);
	if ($r[gambar]!='no_image.jpg'){
	unlink("../../../upload/images/foto/$r[gambar]");
	mysql_query("UPDATE artikel SET gambar='no_image.jpg' WHERE kd_artikel=$id");
	}
	header("location:../../artikel.php?page=edit&id=$id");
}elseif ($page=='artikel'&$untukdi=='terbit') {
	$id = $_GET['id']; 
	mysql_query("UPDATE artikel SET terbit='1' where kd_artikel = $id ");
	header("location:../../artikel.php");
}elseif ($page=='artikel'&$untukdi=='batal') {
	$id = $_GET['id']; 
	mysql_query("UPDATE artikel SET terbit='0' where kd_artikel = $id ");
	header("location:../../artikel.php");
}else{
	echo "masih kosong";
}
?>