<?php
$database = "asset/database/admin.php";
if (isset($_GET['page']) && $_GET['page']=='tambah') {
	include "admin_tambah.php";
}elseif (isset($_GET['page']) && $_GET['page']=='edit') {
	include "admin_edit.php";
}else{
?>

<div class="isikanan"><!--Awal class isi kanan-->
<div class="judulbox">LIST ADMIN</div>
<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<?php echo "<a href='artikel.php?page=admin'>Jumlah data</a>"; ?> (<?php echo mysql_num_rows(mysql_query("SELECT * from admin")); ?>)&nbsp;&nbsp;
			</div>
			
			<div class="cari">
			<form method="POST" <?php echo "action=?pilih=pencarian";?> >
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>
</div>
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='<?php $database;?>?page=tambah';">
			</div>
<div class="clear"></div>
		<table class="tabel" id="results">
			<tr>
				<th class="tabel">No</th>
				<th class="tabel">Username</th>
				<th class="tabel">Nama Lengkap</th>
				<th class="tabel">Email</th>
				<th class="tabel">No.Hp</th>
				<th class="tabel">Alamat</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$link=mysql_query("SELECT * FROM admin ORDER BY id_admin ASC");
				$cek_link=mysql_num_rows($link);
				
				if($cek_link > 0){
				while($g=mysql_fetch_array($link)){
			?>
			
			<tr class="tabel">
				<td class="tabel"><?php echo $no;?></td>
				<td class="tabel"><?php echo "$g[username]";?></td>
				<td class="tabel"><?php echo "$g[nama_lengkap]";?></td>
				<td class="tabel"><?php echo "$g[email]";?></td>
				<td class="tabel"><?php echo "$g[no_hp]";?></td>
				<td class="tabel"><?php echo "$g[alamat]";?></td>
				
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "?page=admin&untukdi=hapus&id=$g[id_admin]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?page=edit&id=$g[id_admin]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA GALERI PADA ALBUM<u>
			<?php
			?></u>
			BELUM TERSEDIA</b></td></tr>
			<?php }
			?>
			
		</table>
</div>

<?php } ?>