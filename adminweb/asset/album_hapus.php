<?php
$id = $_GET['id'];
mysql_query("DELETE FROM album_galeri WHERE id_album=$id");

header("location:index.php?page=album_galeri");
?>