<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<?php include "atas.php"; ?>
<link href='./images/favicon.ico' rel='icon' type='image/x-icon'/>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/responsiveslides.js"></script>
	<script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        pager: true,
        nav: true,
        speed: 500,
        maxwidth: 800,
        namespace: "centered-btns"
      });
    });
  </script>
  	
</head>
<body onload="load()" onunload="GUnload()">
<!-- Header
-->
<?php include "header.php"; ?>

<!--------------Navigation---------------->

<nav>
	<ul>
		<?php
		include "konfig/config.php";
		include "menu.php"; ?>
	</ul>
</nav>

			
<!--------------Content---------------->
<section id="content">
	<div class="zerogrid">
		<div class="row block">
			<div class="main-content col11">
				<?php
					if (isset($_GET['page']) && $_GET['page']=='home') {
						include "home.php";
					}else if (isset($_GET['page']) && $_GET['page']=='profile') {
									include "profile.php";
					}else if (isset($_GET['page']) && $_GET['page']=='obwis') {
									include "objek wisata.php";
					}else if (isset($_GET['page']) && $_GET['page']=='galeri') {
									include "galeri.php";
					}else if (isset($_GET['page']) && $_GET['page']=='contact') {
									include "contact.php";
					}else if (isset($_GET['page']) && $_GET['page']=='detartikel') {
									include "detartikel.php";
					}else if (isset($_GET['page']) && $_GET['page']=='artikel') {
									include "list_artikel.php";
					}else if (isset($_GET['page']) && $_GET['page']=='komartikel') {
									include "artikel_komen.php";
					}else if (isset($_GET['page']) && $_GET['page']=='event') {
									include "event.php";
					}else if (isset($_GET['page']) && $_GET['page']=='photo') {
									include "photo.php";
					}else if (isset($_GET['page']) && $_GET['page']=='wisatabangun') {
									include "wisatabangun.php";
					}else if (isset($_GET['page']) && $_GET['page']=='wisataalam') {
									include "wisataalam.php";
					}else if (isset($_GET['page']) && $_GET['page']=='cari') {
									include "pencarian.php";
					}else{
									include "home.php";
					}
				?>
			</div>
			<div class="sidebar col05">
			<?php include "sidebar.php"; ?>
			</div>

		</div>
	</div>
</section>

<!--------------Footer---------------->
<footer>
	<?php include "zergid.php"; ?>
</footer>

<div id="copyright">
	<?php include "footer.php"; ?>
</div>

</body></html>