<?php
require_once("koneksi.php");
$id = $_GET['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$pass = $_POST['pass'];

$update = mysqli_query($con,"UPDATE user SET nama='$nama', username='$username', pass='$pass' WHERE id_user='$id'");

  if($update){
    header ("location:../admin/user_admin.php");
    
  }else{
    
    header ("localtion:../admin/update_user.php");
    
  }

  ?>