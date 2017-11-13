<?php
require_once("koneksi.php");
$nama_pelanggaran = $_POST['nama_pelanggaran'];
$min_poin = $_POST['min_poin'];

if(empty($nama_pelanggaran)||empty($min_poin)){
	echo "<script>alert(\"Data tidak boleh ada yang kosong!\");
	window.history.back()</script>";
}
else{
	$kirim = mysqli_query($con,"INSERT INTO pelanggaran(id_pelanggaran, nama_pelanggaran, min_poin) VALUES('','$nama_pelanggaran','$min_poin')");
	if($kirim){
    echo "<script>alert(\"Add Sukses!\");
  location.href = \"../admin/pelanggaran_admin.php\";</script>";
    
  }else{
    
    echo "<script>alert(\"Register Gagal!\");
  location.href = \"../admin/form_pelanggaran.php\";</script>";
    
  }
}
?>