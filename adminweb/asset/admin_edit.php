<?php
$id = $_GET['id'];
$adm = mysql_query("SELECT * FROM admin where id_admin = $id");
$data = mysql_fetch_array($adm);

?>
<h3>Tambah Admin</h3>
<div class="kanankecil"><!--Awal class isi kanan-->
								
		<table class="isian">
		<form method='POST' <?php echo "action='asset/database/admin.php?page=admin&untukdi=edit'";?> name='tambahadmin' id='tambahadmin' enctype="multipart/form-data">
			<input type="hidden" name="id" class="maksimal" value="<?php echo $data['id_admin'] ?>">
			<tr><td class="isiankanan" width="175px">Username</td><td class="isian"><input type="text" name="username" class="maksimal" value="<?php echo $data['username'] ?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Nama Lengkap</td><td class="isian"><input type="text" name="nama" class="maksimal" value="<?php echo $data['nama_lengkap'] ?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="maksimal" value="<?php echo $data['email'] ?>"></td></tr>
			<tr><td class="isiankanan" width="175px">No. Hp</td><td class="isian"><input type="text" name="no_hp" class="maksimal" value="<?php echo $data['no_hp'] ?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Alamat</td><td class="isian"><textarea name="alamat" class="maksimal"><?php echo $data['alamat']; ?></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
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