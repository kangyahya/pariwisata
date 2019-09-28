<?php
include "../../konfig/config.php";

mysql_query("INSERT INTO admin(username, nama_lengkap, email, password, no_hp, alamat) VALUES ('$_POST[username]','$_POST[nama]','$_POST[email]',md5('$_POST[password]'),'$_POST[no_hp]','$_POST[alamat]')");

('location:../index.php?page=admin');

?>