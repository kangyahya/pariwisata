<h3>Tambah Admin</h3>
<div class="kanankecil"><!--Awal class isi kanan-->
								
		<table class="isian">
		<form method='POST' <?php echo "action='asset/database/admin.php?page=admin&untukdi=tambah'";?> name='tambahadmin' id='tambahadmin' enctype="multipart/form-data">
			
			<tr><td class="isiankanan" width="175px">Username</td><td class="isian"><input type="text" name="username" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Nama Lengkap</td><td class="isian"><input type="text" name="nama" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Password</td><td class="isian"><input type="Password" name="password" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">No. Hp</td><td class="isian"><input type="text" name="no_hp" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Alamat</td><td class="isian"><textarea name="alamat" class="maksimal"></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahadmin");
			frmvalidator.addValidation("username","req","Username harus diisi");
			frmvalidator.addValidation("nama","req","Nama Lengkap harus diisi");
			frmvalidator.addValidation("email","req","Email harus valid");
			frmvalidator.addValidation("password","req","passord harus diisi");
			frmvalidator.addValidation("alamat", "Alamat harus diisi");
			
			//]]>
		</script>
		
		</table>
</div>