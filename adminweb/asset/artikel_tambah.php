<h3>Tambah Artikel</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
	<!--		<div class="menuhorisontalaktif-ujung"><a href="berita.php">Artikel</a></div> -->
		</div>
		
		<table class="isian">
		<form method="POST" <?php echo "action='asset/database/artikel.php?page=artikel&untukdi=tambah'";?> name='tambahartikel' id='tambahartikel' enctype="multipart/form-data">
			<?php
			echo "<input type='hidden' name='penulis' value='$_SESSION[namalengkap]'>";
			?>
			
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="judul"
			value="Judul artikel disini..." onblur="if(this.value=='') this.value='Judul artikel disini...';" onfocus="if(this.value=='Judul artikel disini...') this.value='';"></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea class="tini" name="isi"></textarea></td></tr>
			
			<tr><td class="isiankanan" width="100px">Gambar Kecil</td>
				<td class="isian"><input type="file" name="fupload"></td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Gambar kecil digunakan untuk headline halaman depan website dan summary pada halaman arsip</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Kategori</td>
				<td class="isian">
					<select name="kategori">
						<option value="0" selected>Pilih Kategori..</option>
						<?php
						$kategori=mysql_query("SELECT * FROM kategori");
						while ($r=mysql_fetch_array($kategori)){
						echo " <option value=$r[kd_kategori]>$r[judul]</option>";} ?>
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