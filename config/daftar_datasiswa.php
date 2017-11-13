<?php
require_once("koneksi.php");
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['id_jurusan'];
$indeks = $_POST['indeks'];
$nama_ortu = $_POST['nama_ortu'];
$no_ortu = $_POST['no_ortu'];
$alamat = $_POST['alamat'];
$poin = $_POST['poin'];

$kirim = mysqli_query($con,"INSERT INTO data_siswa(nis, nama_siswa, id_jurusan, kelas, indeks, nama_ortu, no_ortu, alamat, poin) VALUES ('$nis', '$nama_siswa', '$jurusan','$kelas','$indeks', '$nama_ortu', '$no_ortu', '$alamat', '$poin')");

	if($kirim){
    echo "<script>alert(\"Add Sukses!\");
  location.href = \"../admin/datasiswa_admin.php\";</script>";
    
  }else{
    
    echo "<script>alert(\"Register Gagal!\");
  location.href = \"../admin/form_datasiswa.php\";</script>";
    
  }

?>