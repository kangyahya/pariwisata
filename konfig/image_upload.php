<?php
function UploadGaleri($fupload_name){
   //direktori untuk foto galeri

  $vdir_upload = "../../../upload/images/galeri/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadAlbum($fupload_name){
   //direktori untuk foto galeri
  $vdir_upload = "../../../upload/images/album/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadGambar($fupload_name){
   //direktori untuk gambar umum
  $vdir_upload = "../../../upload/images/foto/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
?>