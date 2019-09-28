<?php
$database = "asset/database/link_list.php";
if (isset($_GET['page']) && $_GET['page']=='tambah') {
	include "link_tambah.php";
}elseif (isset($_GET['page']) && $_GET['page']=='edit') {
	include "link_edit.php";
}else{
?>
<h3>Link List</h3>
<div class="kanankecil"><!--Awal class isi kanan-->
<div class="atastabel" style="margin-bottom: 10px">
			
</div>
<div class="clear"></div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">Nama</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">&nbsp;</th>
				<th class="tabel">Link</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$link=mysql_query("SELECT * FROM linklist ORDER BY id ASC");
				$cek_link=mysql_num_rows($link);
				
				if($cek_link > 0){
				while($g=mysql_fetch_array($link)){
			?>
			
			<tr class="tabel">
				<td class="tabel"><?php echo "$g[nama]";?></td>
				<td class="tabel" width="25px">&nbsp;</td>
				<td class="tabel">&nbsp;</td>
				<td class="tabel"><?php echo "$g[link]";?></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?page=links&untukdi=hapus&id=$g[id]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?page=edit&id=$g[id]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA GALERI PADA ALBUM<u>
			<?php
			$nama_album=mysql_query("SELECT * FROM album_galeri WHERE id_album='$_POST[album]'");
			$na=mysql_fetch_array($nama_album);
			echo "$na[nama_album]";
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