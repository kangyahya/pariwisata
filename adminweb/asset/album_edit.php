<h3>Edit Album Galeri</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="album_galeri.php">Album Galeri</a></div>
			<div class="menuhorisontal"><a href="galeri_photo.php">Galeri Foto</a></div>
		</div>
		<?php
		$id = $_GET['id'];
		$edit = mysql_query("SELECT * FROM album_galeri where id_album = $id");
		$dat = mysql_fetch_array($edit);
		$lokasi_file = $_FILES['fupload']['tmp_name'];
		$nama_file   = $_FILES['fupload']['name'];
		?>
		<table class="isian">
		<form method='POST' <?php echo "action='asset/database/album.php?page=album&untukdi=edit'";?> name='tambahalbum' id='tambahalbum' enctype="multipart/form-data">
			<input type="hidden" name="id_album" value="<?php echo $dat['id_album']; ?>">
			<input type="hidden" name="tgl" value="<?php echo $dat['tanggal']; ?>">
			<tr><td class="isiankanan" width="175px">Nama Album</td><td class="isian"><input type="text" name="nama_album" class="maksimal" value="<?php echo $dat['nama_album']?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Foto Sampul</td><td class="isian"><img src="../upload/images/album/<?php echo "$dat[foto_album]";?>" width="200px"></td></tr>
			<tr><td class="isiankanan" width="175px">Ganti Foto</td><td class="isian"><input type="file" name="fupload" value="<?php echo $_FILES['$dat[foto_album]']['name'];?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"><?php echo $dat['deskripsi_album']; ?></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahalbum");
			frmvalidator.addValidation("nama_album","req","Nama album harus diisi");
			frmvalidator.addValidation("nama_album","maxlen=30","Nama album maksimal 50 karakter");
			
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk foto sampul adalah : jpg, gif, png");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->