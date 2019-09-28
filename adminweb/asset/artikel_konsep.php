<div class="isikanan"><!--Awal class isi kanan-->
<div class="judulbox">Artikel</div>
<div class="atastabel" style="margin-bottom: 10px">
			<div class="tombol">
			<?php echo "<a href='artikel.php?page=artikel'>Jumlah data</a>"; ?> (<?php echo mysql_num_rows(mysql_query("SELECT * from artikel")); ?>)&nbsp;&nbsp;|
			<?php echo "<a href='artikel.php?page=terbit'>Terbit</a>"; ?> (<?php echo mysql_num_rows(mysql_query("SELECT * from artikel where terbit ='1'")); ?>)&nbsp;&nbsp;|
			<?php echo "<a href='artikel.php?page=konsep'>Konsep</a>"; ?> (<?php echo mysql_num_rows(mysql_query("SELECT * from artikel where terbit ='0'"));?>)
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
				<th class="tabel" width="25px">Judul</th>
				<th class="tabel" width="25px">&nbsp;</th>
				<th class="tabel" width="25px">Penulis</th>
				<th class="tabel" width="25px">Tanggal</th>
				<th class="tabel" width="25px">Kategori</th>
				<th class="tabel" width="25px">Komentar</th>
				<th class="tabel" width="100px">Pilihan</th>
			</tr>
			<?php
				$no=1;
				$link=mysql_query("SELECT * FROM artikel where terbit='0' ORDER BY kd_artikel DESC");
				
				$cek_link=mysql_num_rows($link);
				
				if($cek_link > 0){
				while($g=mysql_fetch_array($link)){
					$kom = mysql_query("SELECT * FROM komentar_artikel where kd_artikel = $g[kd_artikel]");
					$hit = mysql_num_rows($kom);
					$kat = mysql_query("SELECT * FROM kategori where kd_kategori=$g[kd_kategori]");
					$kate = mysql_fetch_array($kat);
			?>
			
			<tr class="tabel">
				<td class="tabel" width="100px"><?php echo "$g[judul]";?></td>
				<td class="tabel" width="25px">&nbsp;</td>
				<td class="tabel" width="25px"><?php echo "$g[penulis]";?></td>
				<td class="tabel" width="25px"><?php echo "$g[tgl_artikel]";?></td>
				<td class="tabel" width="25px"><?php echo "$kate[judul]";?></td>
				<td class="tabel" width="25px"><?php echo $hit; ?></td>
				<td class="tabel">
					<?php
					if ($g[terbit]=='1') {
						echo "
						<div class='hapusdata'><a href='$database?page=artikel&untukdi=hapus&id=$g[kd_artikel]'>hapus</a></div>
						<div class='editdata'><a href='?page=edit&id=$g[kd_artikel]'>edit</a></div>
						<div class='bataldata'><a href='$database?page=artikel&untukdi=batal&id=$g[kd_artikel]'>batal</a></div>
						";
					}else{
						echo "
						<div class='hapusdata'><a href='$database?page=artikel&untukdi=hapus&id=$g[kd_artikel]'>hapus</a></div>
						<div class='editdata'><a href='?page=edit&id=$g[kd_artikel]'>edit</a></div>
						<div class='terbitdata'><a href='$database?page=artikel&untukdi=terbit&id=$g[kd_artikel]'>terbit</a></div>
						";
					}
					?>
					
				</td>
			</tr>
			<?php
			
			}}
			else { ?>
			<tr class="tabel"><td class="tabel" colspan="6"><b>ARTIKEL<u>
			<?php
			$nama_album=mysql_query("SELECT * FROM artikel WHERE judul='$_POST[judul]'");
			$na=mysql_fetch_array($nama_album);
			echo "$na[judul]";
			?></u>
			BELUM TERSEDIA</b></td></tr>
			<?php }
			?>
			
		</table>
</div>