<?php
$id = $_GET['id'];
$art = mysql_query("SELECT * FROM artikel WHERE kd_artikel=$id");
$dart = mysql_fetch_array($art);

?>
<div class="isikanan"><!--Awal class isi kanan-->								
		<div class="judulisikanan">
				<div class="judulbox"> Edit Artikel</div>
	<!--		<div class="menuhorisontalaktif-ujung"><a href="berita.php">Artikel</a></div> -->
		</div>
		
		<table class="isian">
		<form method="POST" <?php echo "action='asset/database/artikel.php?page=artikel&untukdi=edit'";?> name='tambahartikel' id='tambahartikel' enctype="multipart/form-data">
			<?php
			echo "<input type='hidden' name='penulis' value='$_SESSION[namalengkap]'>
				<input type='hidden' name='id' value='$id'>

			";
			?>
			
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="judul"
			value="<?php echo "$dart[judul]"; ?>" onblur="if(this.value=='') this.value='<?php echo "$dart[judul]"; ?>';" onfocus="if(this.value=='<?php echo "$dart[judul]"; ?>') this.value='<?php echo "$dart[judul]"; ?>';"></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea class="tini" name="isi"><?php echo "$dart[isi]"; ?></textarea></td></tr>
			<tr><td class="isiankanan" width="100px">Gambar kecil</td>
				<td class="isian"><img src="../upload/images/foto/<?php echo $dart[gambar] ?>" width="200px">
				<?php if ($dart[gambar] !='no_image.jpg'){?>
				<br><br>
				<a href="<?php echo "$database?page=artikel&untukdi=hapusgambar&id=$dart[kd_artikel]";?>"><b><u>Hapus gambar</u></b></a>
				<?php } ?>
				</td>
			</tr>
			<tr><td class="isiankanan" width="100px">Ganti gambar</td>
				<td class="isian"><input type="file" name="fupload"></td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Gambar kecil digunakan untuk headline halaman depan website dan summary pada halaman arsip</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Kategori</td>
				<td class="isian">
					<select name="kategori">
					<option value="0">Pilih Kategori
						<?php
						$kat = mysql_query("SELECT * FROM kategori");
						while ($r=mysql_fetch_array($kat)){
							if ($r['kd_kategori'] == $dart['kd_kategori']) {
								$pilih = "selected";
							}else{
								$pilih ='';
							}
						echo " <option value='$dart[kd_kategori]' $pilih >$r[judul]</option>";} ?>
						</option>
					</select>
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Pilih kategori untuk artikel, jika anda tidak memilih kategori maka secara otomatis diinputkan "Tanpa Kategori"</i><br><hr></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Terbitkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahartikel");
			frmvalidator.addValidation("judul","req","Judul artikel harus diisi");
			frmvalidator.addValidation("judul","maxlen=100","Judul artikel maksimal 100 karakter");
			frmvalidator.addValidation("judul","minlen=5",	"Judul artikel minimal 5 karakter");
	  
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
			//]]>
		</script>
		
		</table>

</div><!--Akhir class isi kanan-->