<?php
require_once "koneksi.php";
$id=$_GET['id'];
$query=mysqli_query($con,"DELETE from data_siswa where nis='$id'");
if($query){
header ("location:../admin/datasiswa_admin.php");
}else{
echo "Gagal hapus data!";
}
?>