<?php
include "../../konfig/config.php";
$id = $_GET['id'];
$link=mysql_query("SELECT * FROM markers where id=$id");
while ($dl=mysql_fetch_array($link)) {
	$ids = $dl[id];
	$nama = $dl[nama];
	$alamat = $dl[alamat];
	$lat = $dl[lat];
	$long = $dl[lng];
	$tip = $dl[tipe]; 
}
?>
<h3>Tambah Lokasi</h3>
<div class="kanankecil"><!--Awal class isi kanan-->
								
		<table class="isian">
		<form method='POST' <?php echo "action='asset/database/objek_wisata.php?page=obwis&untukdi=edit'";?> name='editlokasi' id='editlokasi' enctype="multipart/form-data">
			<input type="hidden" name="id" class="maksimal" value="<?php echo $id; ?>">
			<tr><td class="isiankanan" width="175px">Nama</td><td class="isian"><input type="text" name="nama" class="maksimal" value="<?php echo $nama; ?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Alamat</td><td class="isian"><input type="text" name="alamat" class="maksimal" value="<?php echo $alamat; ?>"></td></tr>
			<tr><td class="isiankanan" width="175px" >Latitude</td><td class="isian"><input type="text" name="lat" class="maksimal" value="<?php echo $lat; ?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Longitude</td><td class="isian"><input type="text" name="long" class="maksimal" value="<?php echo $long; ?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Tipe</td><td class="isian"><input type="text" name="tipe" class="maksimal" value="<?php echo $tip; ?>"></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Ubah">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editlokasi");
			frmvalidator.addValidation("nama","req","Nama Lokasi harus diisi");
			frmvalidator.addValidation("alamat","req","Alamat harus diisi");
			frmvalidator.addValidation("lat","req","Latitude harus diisi");
			frmvalidator.addValidation("long","req","Longitude harus diisi");
			frmvalidator.addValidation("tipe","req","Tipe harus diisi");
			
			//]]>
		</script>
		
		</table>
</div>