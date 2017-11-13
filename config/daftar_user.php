<?php
require_once("koneksi.php");
$nama = $_POST['nama'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$level = $_POST['level'];

if(empty($nama)||empty($username)||empty($pass)||empty($level)){
	echo "<script>alert(\"Data tidak boleh ada yang kosong!\");
	window.history.back()</script>";
}
else{
	$kirim = mysqli_query($con,"INSERT INTO user(id_user,nama, username, pass,level) VALUES('','$nama','$username','$pass','$level')");
	if($kirim){
    echo "<script>alert(\"Register Sukses!\");
  location.href = \"../admin/user_admin.php\";</script>";
    
  }else{
    
    echo "<script>alert(\"Register Gagal!\");
  location.href = \"../admin/form_register.php\";</script>";
    
  }
}
?>