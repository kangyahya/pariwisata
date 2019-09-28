<h3>Tambah Album Galeri</h3>
<div class="isikanan"><!--Awal class isi kanan-->								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="album_galeri.php">Album Galeri</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="galeri_photo.php">Galeri Foto</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='asset/database/galeri.php?page=galeri&untukdi=edit'";?> name='tambahgaleri' id='tambahgaleri' enctype="multipart/form-data">
		<?php
		$edit=mysql_query("SELECT * FROM galeri, album_galeri WHERE galeri.id_album=album_galeri.id_album AND id_galeri='$_GET[id]'");
		$r=mysql_fetch_array($edit);
		
		echo "<input type='hidden' name='id' value='$r[id_galeri]'>";
		?>	
			<tr><td class="isiankanan" width="175px">Album</td><td class="isian">
			<select name="id_album">
						<option value="<?php echo "$r[id_album]";?>" selected><?php echo "$r[nama_album]";?></option>
						<?php
						$album=mysql_query("SELECT * FROM album_galeri WHERE id_album!=$r[id_album]");
						while($ag=mysql_fetch_array($album)){
						?>
						<option value="<?php echo "$ag[id_album]";?>"><?php echo "$ag[nama_album]";?></option>
						<?php } ?>
					</select></td></tr>
			<tr><td class="isiankanan" width="175px">Foto Sebelumnya</td><td class="isian"><a href="../upload/images/galeri/<?php echo "$r[nama_galeri]";?>" class="highslide" onclick="return hs.expand(this)"><img src="../upload/images/galeri/<?php echo "$r[nama_galeri]";?>" width="200px"></a></td></tr>
			<tr><td class="isiankanan" width="175px">Ganti Foto</td><td class="isian"><input type="file" name="fupload"></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
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