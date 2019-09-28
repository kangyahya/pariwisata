<h3>Tambah Lokasi</h3>
<div class="kanankecil"><!--Awal class isi kanan-->
								
		<table class="isian">
		<form method='POST' <?php echo "action='asset/database/objek_wisata.php?page=obwis&untukdi=tambah'";?> name='tambahlokasi' id='tambahlokasi' enctype="multipart/form-data">
			
			<tr><td class="isiankanan" width="175px">Nama</td><td class="isian"><input type="text" name="nama" class="maksimal" placeholder="Keraton Kasepuhan"></td></tr>
			<tr><td class="isiankanan" width="175px">Alamat</td><td class="isian"><input type="text" name="alamat" class="maksimal" placeholder="Pegajahan, Kec. Lemahwungkuk Kota Cirebon"></td></tr>
			<tr><td class="isiankanan" width="175px" >Latitude</td><td class="isian"><input type="text" name="lat" class="maksimal" placeholder="-6.726334"></td></tr>
			<tr><td class="isiankanan" width="175px">Longitude</td><td class="isian"><input type="text" name="long" class="maksimal" placeholder="108.571007"></td></tr>
			<tr><td class="isiankanan" width="175px">Tipe</td><td class="isian"><input type="text" name="tipe" class="maksimal" placeholder="Wisata, Hotel, Toko, Masjid"></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahlokasi");
			frmvalidator.addValidation("nama","req","Nama Lokasi harus diisi");
			frmvalidator.addValidation("alamat","req","Alamat harus diisi");
			frmvalidator.addValidation("lat","req","Latitude harus diisi");
			frmvalidator.addValidation("long","req","Longitude harus diisi");
			frmvalidator.addValidation("tipe","req","Tipe harus diisi");
			
			//]]>
		</script>
		
		</table>
</div>