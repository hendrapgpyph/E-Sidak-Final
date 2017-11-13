<?php
require_once("../config/koneksi.php");
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$nama_ortu = $_POST['nama_ortu'];
$no_ortu = $_POST['no_ortu'];
$alamat = $_POST['alamat'];
$poin = $_POST['poin'];
$kelas = $_GET['kelas'];
$jurusan = $_GET['jurusan'];
$indeks = $_GET['indeks'];
$kirim = mysqli_query($con,"INSERT INTO data_siswa(nis, nama_siswa, id_jurusan, kelas, indeks, nama_ortu, no_ortu, alamat, poin) VALUES ('$nis', '$nama_siswa', '$jurusan','$kelas','$indeks', '$nama_ortu', '$no_ortu', '$alamat', '$poin')");
	if($kirim){
    echo "<script>alert(\"Add Sukses!\");
  location.href = \"sistem_info_siswa.php?kelas=".$kelas."&jurusan=".$jurusan."&indeks=".$indeks."\";</script>";

  }else{

    echo "<script>alert(\"Register Gagal!\");
  location.href = \"../admin/form_datasiswa.php\";</script>";

  }
?>
