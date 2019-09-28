<h3>Galeri Foto</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="album_galeri.php">Album Galeri</a></div>
			<div class="menuhorisontalaktif-ujung"><a href="galeri_photo.php">Galeri Foto</a></div>
		</div>

		<div class="atastabel" style="margin: 30px 10px 0 10px">
			<div class="tombol">
				<?php
			$hitungfoto=mysql_query("SELECT * FROM galeri");
			$jumlahfoto=mysql_num_rows($hitungfoto);
			?>
			Jumlah data (<?php echo "$jumlahfoto";?>)
			
			</div>
			<div class="cari">
			<form method="POST" action="?pilih=pencarian">
			<input type="text" class="pencarian" name="cari">
			<input type="submit" class="pencet" value="Cari">
			</form>
			</div>
		</div>
		<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<form method="POST" style="float: left" action="galeri_photo.php?page=tampil">
				<select name="id_album" onChange="this.form.submit()">
					<option value="" selected>Tampil Berdasarkan Album</option>
					<?php
					$tampilalbum=mysql_query("SELECT * FROM album_galeri ORDER BY id_album DESC");
					while ($ta=mysql_fetch_array($tampilalbum)){
					echo "<option value='$ta[id_album]'>$ta[nama_album]</option>";}
					?>
				</select>
			</form>
			</div>
			
			<?php echo "<form method='POST' action='index.php?page=hapusgaleri'>"; ?>
			<div class="cari">
			<input type="button" class="pencet" value="Tambah" onclick="window.location.href='?page=tambah';">
			<input type="submit" class="hapus" value="Hapus yang ditandai">
			</div>
		</div>
		<div class="clear"></div>
		
		<table class="tabel" id="results">
			<tr>
				<th class="tabel" width="25px">No</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel">&nbsp;</th>
				<th class="tabel">Tgl. Upload</th>
				<th class="tabel">Album</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$id_alb = $_POST['id_album'];
				$galeri=mysql_query("SELECT id_galeri, tanggal_galeri, nama_galeri, id_album, nama_album FROM galeri natural join album_galeri where id_album=$id_alb ORDER BY id_galeri DESC");
				$cek_galeri=mysql_num_rows($galeri);
				
				if($cek_galeri > 0){
				while($g=mysql_fetch_array($galeri)){
				?>
				<tr class="tabel">
				<td class="tabel"><?php echo "$no";?></td>
				<td class="tabel"><?php echo "<input type=checkbox name=cek[] value=$g[id_galeri] id=id$no>"; ?></td>
				<td class="tabel"><center>
				<a href="../upload/images/galeri/<?php echo "$g[nama_galeri]";?>" class="highslide" onclick="return hs.expand(this)">
				<img src="../upload/images/galeri/<?php echo "$g[nama_galeri]";?>" width="100px" ><br><?php echo "$g[nama_galeri]";?></a>
				</center></td>
				<td class="tabel"><?php echo "$g[tanggal_galeri]";?></td>
				<td class="tabel"><a href="<?php echo "index.php?page=editalbum&id=$g[id_album]";?>"><b><?php echo "$g[nama_album]";?></b></a></td>
				<td class="tabel">
					<div class="hapusdata"><a href="<?php echo "$database?page=galeri&untukdi=hapus&id=$g[id_galeri]";?>">hapus</a></div>
					<div class="editdata"><a href="<?php echo "?page=edit&id=$g[id_galeri]";?>">edit</a></div>
				</td>
			</tr>
				<?php 
				$no++;
			}}
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