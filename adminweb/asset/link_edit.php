<?php
include "../../konfig/config.php";
$id = $_GET['id'];
$link=mysql_query("SELECT * FROM linklist where id=$id");
while ($dl=mysql_fetch_array($link)) {
	$ids = $dl[id];
	$nama = $dl[nama];
	$links = $dl[link]; 
}
?>

<h3>Edit Link List</h3>
<div class="kanankecil"><!--Awal class isi kanan-->
								
		<table class="isian">
		<form method='POST' <?php echo "action='asset/database/link_list.php?page=links&untukdi=edit'";?> name='ubahlink' id='ubahlink' enctype="multipart/form-data">
			<input type="hidden" name="ids" value="<?php echo $ids; ?>">
			<tr><td class="isiankanan" width="175px">Nama</td><td class="isian"><input type="text" name="nama_link" class="maksimal" value="<?php echo $nama; ?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Link</td><td class="isian"><input type="text" name="link" class="maksimal" value="<?php echo $links; ?>"></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Ubah">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("ubahlink");
			frmvalidator.addValidation("nama","req","Nama Link harus diisi");
			frmvalidator.addValidation("link","maxlen=30","link maksimal 30 karakter");
			
			//]]>
		</script>
		
		</table>
</div>