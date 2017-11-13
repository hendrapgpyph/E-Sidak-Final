<?php
require_once("../config/koneksi.php");
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['id_jurusan'];
$indeks = $_POST['indeks'];
$nama_ortu = $_POST['nama_ortu'];
$no_ortu = $_POST['no_ortu'];
$alamat = $_POST['alamat'];
$poin = $_POST['poin'];
$ambilkelas = $_GET['kelas'];
$ambiljurusan = $_GET['jurusan'];
$ambilindeks = $_GET['indeks'];
$update = mysqli_query($con,"UPDATE data_siswa SET nis='$nis', nama_siswa='$nama_siswa', id_jurusan='$jurusan',kelas='$kelas',indeks='$indeks', nama_ortu='$nama_ortu', no_ortu='$no_ortu', alamat='$alamat', poin='$poin' WHERE nis='$nis'");
  if($update){

  	echo "<script>alert(\"Sukses!\");
    location.href = \"sistem_info_siswa.php?kelas=".$ambilkelas."&jurusan=".$ambiljurusan."&indeks=".$ambilindeks."\";</script>";

  }else{
    header ("location:sistem_info_siswa.php");

  }
  ?>
