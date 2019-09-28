<?php
$id = $_GET['id'];
					$kome = mysql_query("SELECT * FROM komentar_artikel WHERE kd_artikel=$id and status =2");
					$hitung = mysql_num_rows($kome);
$tampil = mysql_query("SELECT kd_artikel, judul, tgl_artikel, ringkasan, isi, penulis, gambar from artikel where kd_artikel=$id")or die("Query failed with error: ".mysql_error());
while ($data = mysql_fetch_array($tampil)) {
	
	?> 
	<div class="rslides_container">
	<div class='heading'>
						<h2><a href='#'><?php echo $data['judul']; ?></a></h2>
						<p class='info'>>>> Posted by <?php echo $data['penulis']; ?> - <?php echo $data['tgl_artikel']; ?> - <?php echo "$hitung"; ?> Comments</p>
					</div>
	</div>
	<article>
					
					<div class='content'>
						<p><justify><a href="index.php?page=home">Info Pariwisata. </a><?php echo $data['isi'];?></justify></p>
					</div>
					<div class="heading">
					<hr width="200px" align="left">
					<h2>Tinggalkan Komentar</h2>
					<hr>
					<form method="post" action="artikel_komen.php">
					<table border="1" class="tabel">
						<tr bgcolor="red">
							<td width="100px" class="tabel">Nama* </td>
							<td width="20px">:</td>
							<td ><input type="text" name="nama" size="30" style="margin-right: 5px; border: 1px solid #dcdcdc; padding: 3.5px; width: 80%;"></td>
						</tr>
						<tr>
							<td width="100px">Email*</td>
							<td width="20px">:</td>
							<td><input type="Email" name="email" style="margin-right: 5px; border: 1px solid #dcdcdc; padding: 3.5px; width: 80%;"><br><i>tidak akan di terbitkan</i></td>
						</tr>
						<tr>
							<td valign="center">Komentar</td>
							<input type="hidden" name="kd_art" value="<?php echo $data['kd_artikel']; ?>">
							<td valign="center">:</td>
							<td><textarea name="komentar" style="margin-right: 5px; border: 1px solid #dcdcdc; padding: 3.5px; width: 80%;"></textarea></td>
						</tr>
						<tr>
							<td colspan="3" align="center">
							<input type="submit" name="send" value="Kirim Komentar" style="background : green; margin: 1em; padding: 5px; border-radius: 2px;">
							<input type="reset" value="Batal" onclick="self.history.back()" style="background : red; margin: 1em; padding: 5px; border-radius: 2px;">
							</td>
						</tr>
					</table>
					</form>
					<hr>
					<?php 

					if($hitung>0){
					?>
					<h2>Ada <?php echo "$hitung"; ?> komentar untuk artikel ini<hr></h2>
					<?php }else{
						echo "<h2>Tidak ada komentar untuk artikel ini";
						}
						if($hitung>0){
						while ($dk = mysql_fetch_array($kome)) {
						echo "
						<td><h3><a href=''>$dk[nama] </a> ($dk[tanggal])</td>
						<td>:</td>
						<td>$dk[isi_komentar]</td>
						<hr>";	
						}}
						?>
					</div>	


	</article>
<?php
}

?>