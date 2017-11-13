<?php
require_once "koneksi.php";
$id=$_GET['id'];
$query=mysqli_query($con,"DELETE from pelanggaran where id_pelanggaran='$id'");
if($query){
header ("location:../admin/pelanggaran_admin.php");
}else{
echo "Gagal hapus data!";
}
?>