<?php
$tampil = mysqli_query($con,"SELECT judul, link from menu_home")or die("Query failed with error: ".mysql_error());
while ($data = mysqli_fetch_assoc($tampil)) {
	
	echo " <li><a href=$data[link]>$data[judul]</a></li>";
}

?>