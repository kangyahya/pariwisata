<?php
$cari = trim($_POST['q']);
$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
?>
<div id="content">
<div id="lebar">
<h3>Hasil Pencarian dengan kata kunci <a href="">"<?php echo "$cari"?>"</a></h3><br><br>
<?php
$pencarian =mysql_query("SELECT * FROM artikel natural join admin WHERE  judul LIKE '%$cari%' ORDER BY kd_artikel DESC");
$hitung=mysql_num_rows($pencarian);

if ($hitung > 0){
while ($r=mysql_fetch_array($pencarian)){
$hitung_komen=mysql_query("SELECT * FROM komentar_artikel WHERE kd_artikel='$r[kd_artikel]'");
$jml_komen=mysql_num_rows($hitung_komen);
?>
<?php echo "<h4><a href='?p=detberita&id=$r[kd_artikel]'>$r[judul]</a></h4><br>
<small>Diposting pada: <a href='?p=tglberita&tgl=$r[tgl_artikel]'>$r[tgl_artikel]</a>, oleh : <a href='?p=userberita&user=$r[penulis]'>$r[nama_lengkap]</a>, Kategori: <a href='?p=katberita&id=$r[kd_kategori]'>$r[judul]</a>
, Komentar : $jml_komen
</small><br>";
						$isi_berita = strip_tags($r['isi']); 
						$isi = substr($isi_berita,0,450);
if ($r['gambar'] != 'no_image.jpg'){
echo "<p><img src='upload/images/foto/$r[gambar]' width='175px' style='float:left; margin: 5px 10px 0 0; padding: 10px; background: #fff; border: 1px solid #dcdcdc'>$isi...<a href='?p=detberita&id=$r[kd_artikel]'>Baca selengkapnya...</a></p><br>";}
else {
echo "<p>$isi...<a href='?p=detartikel&id=$r[kd_artikel]'>Baca selengkapnya...</a></p><br>";
}}}

else {
echo "<p>Berita tidak ditemukan</p>";
}?>
</div>
</div>