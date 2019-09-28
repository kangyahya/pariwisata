<?php 
function UploadFile($fupload_name){
  //direktori file materi dari halaman admin
  $vdir_upload = "../../../file/materi/";
  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadMateri($fupload_name){
  //direktori file dari halaman e-elarning
  $vdir_upload = "../file/materi/";
  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
?>