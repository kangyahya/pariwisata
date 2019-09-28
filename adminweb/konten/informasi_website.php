<div class="kanankecil">
<div class="judulbox">Informasi Website</div>
<table class="isian" style="margin:10px; font-weight: bold;";>
			<?php
			/* Menghitung Jumlah Article */
			$artikel=mysql_query("SELECT * FROM artikel");
			$jmlartikel=mysql_num_rows($artikel);

			/* Menghitung Jumlah Event */
			$event=mysql_query("SELECT * FROM event");
			$jmlevent=mysql_num_rows($event);

			$admin=mysql_query("SELECT * FROM admin");
			$jmladmin=mysql_num_rows($admin);


			?>
			<tr><td class="isiankanan" style="width: 10px;"><?php $hasil = $jmlartikel; echo "$hasil"; ?></td><td class="isian"><a href="?page=artikel">Artikel</a></td><td class="isiankanan" style="width: 10px;"><?php echo "$jmlevent"; ?></td><td class="isian" ><a href="event.php" style="color: #ff6600;">Event</a></td></tr>
			<tr><td class="isiankanan" style="width: 10px;"><?php echo "$jmladmin"; ?></td><td class="isian"><a href="?page=admin">Administrator</a></td></tr>
</table>
</div>
<div class="clear"></div>
<div class="kanankecil">
<div class="judulbox">Komentar Terbaru</div>
<table class="isian" style="margin: 10px; font-weight: bold;">
	<tr>
		<td class="isiankanan">
			<?php
$art = mysql_query("SELECT kd_artikel, judul FROM artikel");
$kom = mysql_query("SELECT kd_komartikel, nama, email, tanggal, judul, isi_komentar, kd_artikel FROM komentar_artikel natural join artikel order by kd_komartikel DESC limit 4");
while ($dat = mysql_fetch_array($kom)) {
	echo "
	<p><a href='mailto:$dat[email]'>$dat[nama]</a> pada <a href='?page=editartikel&id=$dat[kd_artikel]'>$dat[judul]</a> ($dat[tanggal])<br> $dat[isi_komentar]</p>
	";
}
?>
			
		</td>
	</tr>
</table>


</div>