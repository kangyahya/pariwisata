<?php
$database = "asset/database/kategori.php";
if (isset($_GET['page']) && $_GET['page']=='tambah') {
	include "kategori_tambah.php";
}elseif (isset($_GET['page']) && $_GET['page']=='edit') {
	include "kategori_edit.php";
}else{
?>
<h3>Kategori</h3>
<div class="kanankecil"><!--Awal class isi kanan-->
<div class="atastabel" style="margin-bottom: 10px">
			
</div>
<div class="clear"></div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">Judul</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">&nbsp;</th>
				<th class="tabel">Link</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$link=mysql_query("SELECT * FROM Kategori ORDER BY kd_kategori ASC");
				$cek_link=mysql_num_rows($link);
				
				if($cek_link > 0){
				while($g=mysql_fetch_array($link)){
			?>
			
			<tr class="tabel">
				<td class="tabel" width="100px"><?php echo "$g[judul]";?></td>
				<td class="tabel" width="25px">&nbsp;</td>
				<td class="tabel">&nbsp;</td>
				<td class="tabel"><?php echo "index.php?page=$g[link]";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?page=kategori&untukdi=hapus&id=$g[kd_kategori]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?page=edit&id=$g[kd_kategori]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA GALERI PADA ALBUM<u>
			<?php
			$nama_album=mysql_query("SELECT * FROM Kategori WHERE judul='$_POST[judul]'");
			$na=mysql_fetch_array($nama_album);
			echo "$na[judul]";
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