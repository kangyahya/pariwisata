<?php
$database = "asset/database/objek_wisata.php";
if (isset($_GET['page']) && $_GET['page']=='edit') {
	include "lokasi_edit.php";
}elseif (isset($_GET['page']) && $_GET['page']=='tambah') {
	include "lokasi_tambah.php";
}else{
?>
<div class="isikanan"><!--Awal class isi kanan-->
<div class="judulbox">Lokasi Objek Wisata</div>
<div class="atastabel" style="margin-bottom: 10px">
			
</div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="150px">Nama</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">Alamat</th>
				<th class="tabel">Latitude</th>
				<th class="tabel">Longitude</th>
				<th class="tabel">Tipe</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			
			<?php
				$no=1;
				$link=mysql_query("SELECT * FROM markers ORDER BY id ASC");
				$cek_link=mysql_num_rows($link);
				
				if($cek_link > 0){
				while($g=mysql_fetch_array($link)){
			?>
			
			<tr class="tabel">
				<td class="tabel"><?php echo "$g[nama]";?></td>
				<td class="tabel" width="25px">&nbsp;</td>
				<td class="tabel"><?php echo "$g[alamat]";?></td>
				<td class="tabel"><?php echo "$g[lat]";?></td>
				<td class="tabel"><?php echo "$g[lng]";?></td>
				<td class="tabel"><?php echo "$g[tipe]";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?page=obwis&untukdi=hapus&id=$g[id]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?page=edit&id=$g[id]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA LOKASI<u>
			<?php
			$nama_album=mysql_query("SELECT * FROM markers WHERE tipe='$_POST[tipe]'");
			$na=mysql_fetch_array($nama_album);
			echo "$na[tipe]";
			?></u>
			BELUM TERSEDIA</b></td></tr>
			<?php }
			?>
			
		</table>
		<a href="<?php echo "?page=tambah";?>"><table cellpadding="1px" bgcolor="silver" class="tabel">
			<tr class="tabel">
				<th align="center" class="tabel">		<div class="tambah">TAMBAH</div></th>
			</tr>
		</table></a>

</div>
<?php } ?>