<?php

$tampil = mysqli_query($con,"SELECT kd_artikel, judul, tgl_artikel, ringkasan, isi, penulis, gambar from artikel where terbit='1' ORDER BY kd_artikel DESC LIMIT 3")or die("Query failed with error: ".mysql_error());	

while ($data = mysqli_fetch_assoc($tampil)) {
$kome = mysqli_query($con,"SELECT * FROM komentar_artikel WHERE kd_artikel=$data[kd_artikel] and status =2");
					$hitung = mysqli_num_rows($kome);	
	echo " <section><article>
					<div class='heading'>
						<h2><a href='#'>$data[judul]</a></h2>
						<p class='info'>>>> Posted by $data[penulis] - $data[tgl_artikel] - $hitung Comments</p>
					</div>
					<div class='content'>
						<img width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc' src='upload/images/foto/$data[gambar]'/>
						<p><justify>$data[ringkasan]</justify></p>
					</div>
					<div class='footer'>
						<p class='more'><a class='button' href='index.php?page=detartikel&id=$data[kd_artikel]'>Read more >></a></p>
					</div>
				</article></section>";
}

?>