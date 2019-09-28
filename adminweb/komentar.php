<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['admin']))
{
	header('location:login.php');
	exit;
}
else{ ?>
<!--Memanggil awal halaman-->
<?php include "konten/awal.php"; ?>
<body>
<div id="wrapper"><!--Awal id wrapper-->
	<div id="atas"><!--Awal id atas-->
	
	<!--Memanggil bagian header-->
	<?php include "konten/header.php"; ?> 
	
	</div><!--Akhir id atas-->
	<div class="clear"></div>
	
	<div id="konten"><!--Awal id konten-->
		<div id="samping"><!--Awal id samping-->
			<!--Menu yang ditampilkan sesuai dengan halaman yang tampil pada browser (kelas aktif)-->
			<div class="menu"><div class="isimenuHome"><a href="index.php">Beranda</a></div></div>
			<div class="menu"><div class="isimenuBuku"><a href="obwis.php">Lokasi Objek Wisata</a></div></div>
			<div class="menu"><div class="isimenuBerita"><a href="artikel.php">Artikel</a></div></div>
			<div class="menu"><div class="isimenuAlbum"><a href="album_galeri.php">Album Galeri</a></div></div>
			<!--<div class="menu"><div class="isimenuHome"><a href="penginapan.php">Penginapan</a></div></div>-->
			<div class="menu"><div class="isimenuBuku aktif"><a href="komentar.php">Komentar</a></div></div>
			<div class="menu"><div class="isimenuBuku"><a href="kategori.php">Kategori</a></div></div>
			<div class="menu"><div class="isimenuBuku"><a href="link_list.php">Link List</a></div></div>
			<div class="menu"><div class="isimenuAdmin"><a href="admin.php">Menejemen Admin</a></div></div>
		</div><!--Akhir id samping-->
	
		<div id="kanan"><!--Awal id kanan-->
				<!--menampilkan informasi website-->
				<?php include "asset/komentar.php"; ?>
				<?php } ?>
		</div><!--Akhir id kanan-->
	
	</div><!--Akhir id konten-->
	<div class="clear"></div>
	
</div><!--Akhir id wrapper-->

	<div class="clear"></div>
	<!--Memanggil bagian footer-->
<?php include "konten/footer.php";?>