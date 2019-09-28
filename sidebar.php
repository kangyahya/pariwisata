				<section>
					<div class="heading">About us</div>
					<div class="content">
						Info Pariwisata merupakan Website yang menyediakan info info seputar pariwisata yang ada di Kota Cirebon...
					</div>
				</section>
				<section>
					<div class="heading">Categories</div>
					<div class="content">
						<ul class="list">
							<?php
							$tampil = mysqli_query($con,"SELECT judul, kd_kategori, link from kategori")or die("Query failed with error: ".mysql_error());
							while ($data = mysqli_fetch_assoc($tampil)) {
							echo " <li><a href=index.php?page=$data[link]&id=$data[kd_kategori]>$data[judul]</a></li>";
							}

						?>
						</ul>
					</div>
				</section>
				<section>
					<div class="heading">Event</div>
					<div class="content">
					<ul class="list">
						<?php
							$tampil = mysqli_query($con,"SELECT nama_event from event")or die("Query failed with error: ".mysql_error());
							$hitu = mysqli_num_rows($tampil);
							if($hitu > 0){
							while ($data = mysqli_fetch_assoc($tampil)) {
							echo " <li><a href=index.php?page=event>$data[nama_event]</a></li>";
							}
						}else{
							echo "<li>Tidak Ada Event</li>";
						}
						?>
					</ul>
					</div>
				</section>
				<section>
					<div class="heading">Link List</div>
					<div class="content">
					<ul class="list">
						<?php
							$tampil = mysqli_query($con,"SELECT * from linklist")or die("Query failed with error: ".mysql_error());
							while ($data = mysqli_fetch_assoc($tampil)) {
							echo " <li><a href=$data[link] target='_blank'>$data[nama]</a></li>";
							}
						?>
					</ul>
					</div>
				</section>
				<a href="" target="_blank"></a>
				