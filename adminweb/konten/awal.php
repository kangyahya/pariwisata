<!DOCTYPE HTML>
<?php include "../konfig/config.php"; ?>
<html>
<head>
<title>Admin Pariwisata</title>
<link rel="stylesheet" type="text/css" href="css/utama.css">
<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="js/highslide.js"></script>
<script type="text/javascript" src="js/paging.js"></script>
<script type="text/javascript" src="tiny_mce/tiny_mce_gzip.js"></script>
<script type="text/javascript">
	hs.graphicsDir = 'js/graphics/';
	hs.wrapperClassName = 'wide-border';
</script>
    <link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />   
    <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="js/ui/ui.core.js"></script>
    <script type="text/javascript" src="js/ui/ui.datepicker.js"></script>


    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  
	   $(document).ready(function(){
        $("#tanggal1").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
    </script>
    <script type="text/javascript">
        tinyMCE_GZ.init({
            plugins : 'style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,'+ 
                'searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras',
            themes : 'simple,advanced',
            languages : 'en',
            disk_cache : true,
            debug : false
        });
        </script>
        <!-- Needs to be seperate script tags! -->
        <script type="text/javascript">
        tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        relative_urls : false,
        plugins : "style,layer,table,advhr,advimage,advlink,emotions,insertdatetime,preview,media,contextmenu,paste,fullscreen,noneditable,visualchars,|,anchor,xhtmlxtras,safari,imagemanager",
        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,forecolor,|,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,table,|,link,unlink,image,insertimage,|,sub,sup,|,code",
        theme_advanced_buttons2 : "preview,formatselect,fontselect,fontsizeselect,media,emotions,|,outdent,indent,hr,removeformat,visualaid,|,charmap",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
    theme_advanced_resize_horizontal : 0,
    theme_advanced_resizing_use_cookie : 0,
        // Example content CSS (should be your site CSS)
        //content_css : "../../css/admin_style.css",
        /* Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js",*/
        
        });
        </script>
</head>