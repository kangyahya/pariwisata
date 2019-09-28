<h3>Tambah Album Galeri</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="album_galeri.php">Album Galeri</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="galeri_foto.php">Galeri Foto</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='asset/database/galeri.php?page=galeri&untukdi=tambah";?> name='tambahgaleri' id='tambahgaleri' enctype="multipart/form-data">
			
			<tr><td class="isiankanan" width="175px">Album</td><td class="isian"><select name="id_album">
			<option value="">~~Pilih Album~~</option>
				<?php
					$tampilalbum=mysql_query("SELECT * FROM album_galeri ORDER BY id_album DESC");
					while ($ta=mysql_fetch_array($tampilalbum)){
					echo "<option value='$ta[id_album]'>$ta[nama_album]</option>";}
					?>
			</select></td></tr>
			<tr><td class="isiankanan" width="175px">Gambar</td><td class="isian"><input type="file" name="fupload"></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahgaleri");
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk foto sampul adalah : jpg, gif, png");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->