<?php
require_once("koneksi.php");
$id = $_GET['id'];
$nama_pelanggaran = $_POST['nama_pelanggaran'];
$min_poin = $_POST['min_poin'];

$update = mysqli_query($con,"UPDATE pelanggaran SET nama_pelanggaran='$nama_pelanggaran', min_poin='$min_poin' WHERE id_pelanggaran='$id'");

  if($update){
    header ("location:../admin/pelanggaran_admin.php");
    
  }else{
    
    header ("localtion:../admin/update_pelanggaran.php");
    
  }

  ?>