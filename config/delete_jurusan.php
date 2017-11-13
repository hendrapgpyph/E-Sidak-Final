<?php
require_once "koneksi.php";
$id=$_GET['id'];
$query=mysqli_query($con,"DELETE from jurusan where id_jurusan='$id'");
if($query){
header ("location:../admin/jurusan_admin.php");
}else{
echo "Gagal hapus data!";
}
?>