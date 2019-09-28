
<div class="lebar" style="width:150px;

						width: auto;
		padding: 15px;
		margin-right: 20px;
		margin-left: 20px;
		float: left;
		background: #fff;
		border: 1px solid #dcdcdc;
		margin-bottom: 20px;
		line-height: 20px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
						">
						<div class="heading"><h2>Berita</h2><hr></div>

<?php

$tampil = mysqli_query($con,"SELECT kd_artikel, judul, tgl_artikel, ringkasan, isi, penulis, gambar from artikel where terbit='1' ORDER BY kd_artikel DESC")or die("Query failed with error: ".mysql_error());	

while ($data = mysqli_fetch_assoc($tampil)) {
$kome = mysqli_query($con,"SELECT * FROM komentar_artikel WHERE kd_artikel=$data[kd_artikel] and status ='1'");
					$hitung = mysqli_num_rows($kome);	
	echo " <section><article>
					<div class='heading'>
						<h2><a href='#'>$data[judul]</a><hr style='height:1px solid #dcdcdc;'></h2>
						<p class='info'>>>> Posted by $data[penulis] - $data[tgl_artikel] - $hitung Comments</p>
					</div>
					<div class='content'>
						<img width='150px' src='upload/images/foto/$data[gambar]'/>
						<p><justify>$data[ringkasan]</justify></p>
					</div>
					<div class='footer'>
						<p class='more'><a class='button' href='index.php?page=detartikel&id=$data[kd_artikel]'>Read more >></a></p>
					</div>
				</article></section>";
}

?>
</div>