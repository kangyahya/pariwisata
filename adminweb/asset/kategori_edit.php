<?php
include "../../konfig/config.php";
$id = $_GET[id];
$kat = mysql_query("SELECT * FROM kategori where kd_kategori = $id");
while ($dk=mysql_fetch_array($kat)) {
	$id = $dk[kd_kategori];
	$judul = $dk[judul];
	$link = $dk[link];
}
?>

<h3>Edit Kategori</h3>
<div class="kanankecil"><!--Awal class isi kanan-->
								
		<table class="isian">
		<form method='POST' <?php echo "action='asset/database/kategori.php?page=kategori&untukdi=edit'";?> name='editkategori' id='editkategori' enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<tr><td class="isiankanan" width="175px">Judul</td><td class="isian"><input type="text" name="judul" class="maksimal" value="<?php echo $judul;?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Link</td><td class="isian"><input type="text" name="link" class="maksimal" value="<?php echo $link;?>"></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Ubah">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editkategori");
			frmvalidator.addValidation("judul","req","Nama Link harus diisi");
			frmvalidator.addValidation("link","maxlen=30","link maksimal 30 karakter");
			
			//]]>
		</script>
		
		</table>
</div>