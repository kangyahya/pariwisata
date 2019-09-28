<h3>Tambah Link List</h3>
<div class="kanankecil"><!--Awal class isi kanan-->
								
		<table class="isian">
		<form method='POST' <?php echo "action='asset/database/link_list.php?page=links&untukdi=tambah'";?> name='tambahlink' id='tambahlink' enctype="multipart/form-data">
			
			<tr><td class="isiankanan" width="175px">Nama</td><td class="isian"><input type="text" name="nama_link" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Link</td><td class="isian"><input type="text" name="link" class="maksimal"></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahlink");
			frmvalidator.addValidation("nama","req","Nama Link harus diisi");
			frmvalidator.addValidation("link","maxlen=30","link maksimal 30 karakter");
			
			//]]>
		</script>
		
		</table>
</div>