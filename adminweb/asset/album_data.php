<?php
$database="asset/database/album.php";
if (isset($_GET['page']) && $_GET['page']=='tambah') {
 	include "album_tambah.php";
 }elseif (isset($_GET['page']) && $_GET['page']=='edit') {
 	include "album_edit.php";
 }else{ ?>
<h3>Album Galeri</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="album_galeri.php">Album Galeri</a></div>
			<div class="menuhorisontal"><a href="galeri_photo.php">Galeri Foto</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
			<?php
				$hitungalbum=mysql_query("SELECT * FROM album_galeri");
				$jumlah=mysql_num_rows($hitungalbum);
			?>
			Jumlah data (<?php echo "$jumlah";?>)
			</div>
			
		</div>
		
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?page=tambah';">
			</div>
		</div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel">&nbsp;</th>
				<th class="tabel">Nama Album</th>
				<th class="tabel">Tgl. Upload</th>
				<th class="tabel">Jml. Foto</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$album=mysql_query("SELECT * FROM album_galeri ORDER BY id_album DESC");
				$cek_album=mysql_num_rows($album);
				
				if($cek_album > 0){
				while($a=mysql_fetch_array($album)){
			?>
			<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><img src="../upload/images/album/<?php echo "$a[foto_album]";?>" width="75px"></td>
				<td class="tabel"><a href=""><b><?php echo "$a[nama_album]";?></b></a></td>
				<td class="tabel"><?php echo "$a[tanggal_album]";?></td>
				<td class="tabel">
				<?php $foto=mysql_query("SELECT * FROM galeri WHERE id_album=$a[id_album]");
						$jmlfoto=mysql_num_rows($foto);
						echo "$jmlfoto";
						?>
				</td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?page=album&untukdi=hapus&id=$a[id_album]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?page=edit&id=$a[id_album]";?>">edit</a></div>
				</td>
			</tr>
			<?php
			$no++;
			} }
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>DATA ALBUM BELUM TERSEDIA</b></td></tr>
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
</div><!--Akhir class isi kanan-->

<?php } ?>
	