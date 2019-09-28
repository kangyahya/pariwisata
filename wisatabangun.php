<?php
$kat = $_GET['id'];
$tampil = mysql_query("SELECT kd_artikel, judul, tgl_artikel, ringkasan, isi, penulis, gambar from artikel where kd_kategori=$kat ORDER BY kd_artikel DESC")or die("Query failed with error: ".mysql_error());	
$hit = mysql_num_rows($tampil);
if($hit >0 ){
while ($data = mysql_fetch_array($tampil)) {
$kome = mysql_query("SELECT * FROM komentar_artikel WHERE kd_artikel=$data[kd_artikel] and status =2");
					$hitung = mysql_num_rows($kome);	
	echo " <section><article>
					<div class='heading'>
						<h2><a href='#'>$data[judul]</a></h2>
						<p class='info'>>>> Posted by $data[penulis] - $data[tgl_artikel] - $hitung Comments</p>
					</div>
					<div class='content'>
						<img src='upload/images/foto/$data[gambar]'/>
						<p><justify>$data[ringkasan]</justify></p>
					</div>
					<div class='footer'>
						<p class='more'><a class='button' href='index.php?page=detartikel&id=$data[kd_artikel]'>Read more >></a></p>
					</div>
				</article></section>";
}
}else {
	echo "<b> Tidak ada Artikel Untuk Kategori Ini </b>";
}

?>