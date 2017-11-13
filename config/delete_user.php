<?php
require_once "koneksi.php";
$id=$_GET['id'];
$query=mysqli_query($con,"DELETE from user where id_user='$id'");
if($query){
header ("location:../admin/user_admin.php");
}else{
echo "Gagal hapus data!";
}
?>