<?php
require_once("koneksi.php");
$id = $_GET['id'];
$nama_kls = $_POST['nama_kls'];
$singkatan_kls = $_POST['singkatan_kls'];

$update = mysqli_query($con,"UPDATE kelas SET nama_kls='$nama_kls', singkatan_kls='$singkatan_kls' WHERE id_kls='$id'");

  if($update){
    header ("location:../admin/kelas_admin.php");
    
  }else{
    
    header ("localtion:../admin/update_kelas.php");
    
  }

  ?>