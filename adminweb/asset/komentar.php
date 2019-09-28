<?php
$database = "asset/database/komentar.php";
if (isset($_GET['page']) && $_GET['page']=='edit') {
	include "komentar_edit.php";
}elseif (isset($_GET['page']) && $_GET['page']=='tambah') {
	include "komentar_tambah.php";
}elseif (isset($_GET['page']) && $_GET['page']=='diterima') {
	include "komentar_terima.php";
}elseif (isset($_GET['page']) && $_GET['page']=='ditolak') {
	include "komentar_tolak.php";
}else{
?>
<h3>Komentar</h3>
<div class="isikanan">
<div class="judulbox">Komentar Artikel</div>
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<?php echo "<a href='komentar.php?page=komentar'>Jumlah data</a>"; ?> (<?php echo mysql_num_rows(mysql_query("SELECT * from komentar_artikel")); ?>)&nbsp;&nbsp;|
			<?php echo "<a href='komentar.php?page=diterima'>Diterima</a>"; ?> (<?php echo mysql_num_rows(mysql_query("SELECT * from komentar_artikel where status ='1'")); ?>)&nbsp;&nbsp;|
			<?php echo "<a href='komentar.php?page=ditolak'>Ditolak</a>"; ?> (<?php echo mysql_num_rows(mysql_query("SELECT * from komentar_artikel where status ='0'"));?>)
			</div>
			
			<div class="cari">
			<form method="POST" <?php echo "action=?pilih=pencarian";?> >
			<input type="text" class="pencarian" name="cari"><input type="submit" class="pencet" value="Cari">
			</form>
			</div>

			
		</div>
		<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='<?php $database;?>?page=tambah';">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
			<div class="clear"></div>
				<table class="tabel" id="results">
					<tr>
						<th class="tabel" width="20px">No</th>
							<th class="tabel" width="15px">&nbsp;</th>
						<th class="tabel">Nama</th>
						<th class="tabel">Tanggal</th>
						<th class="tabel">Jdl. Artikel</th>
						<th class="tabel">Komentar</th>
						<th class="tabel">Email</th>
						<th class="tabel" width="150px">Pilihan</th>
					</tr>
				<?php
			$no=1;
			if($_SESSION[admin]=='yahya'){
			$komentar=mysql_query("SELECT * FROM komentar_artikel, artikel WHERE komentar_artikel.kd_artikel=artikel.kd_artikel ORDER BY kd_komartikel DESC");
			}
			$cek_komentar=mysql_num_rows($komentar);
			
			if($cek_komentar > 0){
			while ($kom=mysql_fetch_array($komentar)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no"; ?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$kom[kd_komartikel] id=id$no>"; ?></td>
				<td class="tabel"><a href="<?php echo "?page=edit&id=$kom[kd_komartikel]";?>"><?php echo "$kom[nama]";?></a></td>
				<td class="tabel"><?php echo "$kom[tanggal]";?></td>
				<td class="tabel"><a href="<?php echo "index.php?page=edit&id=$kom[kd_artikel]";?>"><b><?php echo "$kom[judul]";?></b></a></td>
				<td class="tabel"><?php echo "$kom[isi_komentar]";?></td>
				<td class="tabel"><?php echo "$kom[email]";?></td>
				<td class="tabel">
				<?php if ($kom[status]== 1) {
				echo "
					<div class='hapusdata'><a href='$database?page=komentar&untukdi=hapus&id=$kom[kd_komartikel]'>hapus</a></div>
					<div class='editdata'><a href='?page=edit&id=$kom[kd_komartikel]'>edit</a></div>
					<div class='bataldata'><a href='$database?page=komentar&untukdi=tolak&id=$kom[kd_komartikel]'>tolak</a></div>"; }
				else {
					echo "
					<div class='hapusdata'><a href='$database?page=komentar&untukdi=hapus&id=$kom[kd_komartikel]'>hapus</a></div>
					<div class='editdata'><a href='?page=edit&id=$kom[kd_komartikel]'>edit</a></div>
					<div class='terbitdata'><a href='$database?page=komentar&untukdi=terima&id=$kom[kd_komartikel]'>terima</a></div>";
				}
					?>
				</td>
			</tr>
			<?php
			$no++;
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="7"><b>DATA KOMENTAR BELUM TERSEDIA</b></td></tr>
			<?php }
			?>
				</table>
				<div class="atastabel" style="margin: 5px 10px 0 10px">
				<div id="pageNavPosition"></div>
		</div>
		<div class="atastabel" style="margin: 5px 10px 0 10px">
		<script type="text/javascript"><!--
        var pager = new Pager('results', 6); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
		</div>

</div>
</div>
<?php

}
?>