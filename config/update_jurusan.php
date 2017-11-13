<?php
require_once("koneksi.php");
$id = $_GET['id'];
$nama = $_POST['nama_jurusan'];
$singkatan = $_POST['singkatan'];
$x = $_POST['x'];
$xi = $_POST['xi'];
$xii = $_POST['xii'];

$update = mysqli_query($con,"UPDATE jurusan SET nama_jurusan='$nama', singkatan='$singkatan', indeks_x='$x', indeks_xi='$xi', indeks_xii='$xii' WHERE id_jurusan='$id'");

  if($update){
    header ("location:../admin/jurusan_admin.php");
    
  }else{
    
    header ("localtion:../admin/update_jurusan.php");
    
  }

  ?>