<?php
require_once("koneksi.php");
$nama_kls = $_POST['nama_kls'];
$singkatan_kls = $_POST['singkatan_kls'];
$x = $_POST['x'];
$xi = $_POST['xi'];
$xii = $_POST['xii'];

if(empty($nama_kls)||empty($singkatan_kls)||empty($x)||empty($xi)||empty($xii)){
	echo "<script>alert(\"Data tidak boleh ada yang kosong!\");
	window.history.back()</script>";
}
else{
$kirim = mysqli_query($con,"INSERT INTO jurusan(id_jurusan, nama_jurusan, singkatan, indeks_x, indeks_xi, indeks_xii) VALUES('','$nama_kls','$singkatan_kls','$x','$xi','$xii')");
	if($kirim){
    echo "<script>alert(\"Add Sukses!\");
  location.href = \"../admin/jurusan_admin.php\";</script>";
    
  }else{
    
    echo "<script>alert(\"Register Gagal!\");
  location.href = \"../admin/form_kelas.php\";</script>";
    
  }
}
?>