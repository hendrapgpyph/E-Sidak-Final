<?php
require_once "../config/koneksi.php";
$id=$_GET['nis'];
$ambilkelas = $_GET['kelas'];
$ambiljurusan = $_GET['jurusan'];
$ambilindeks = $_GET['indeks'];
$query=mysqli_query($con,"DELETE from data_siswa where nis='$id'");
if($query){
echo "<script>alert(\"Sukses!\");
    location.href = \"sistem_info_siswa.php?kelas=".$ambilkelas."&jurusan=".$ambiljurusan."&indeks=".$ambilindeks."\";</script>";
}else{
echo "Gagal hapus data!";
}
?>
