<?php
require_once("koneksi.php");
$id = $_GET['id'];
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['id_jurusan'];
$indeks = $_POST['indeks'];
$nama_ortu = $_POST['nama_ortu'];
$no_ortu = $_POST['no_ortu'];
$alamat = $_POST['alamat'];
$poin = $_POST['poin'];

$update = mysqli_query($con,"UPDATE data_siswa SET nis='$nis', nama_siswa='$nama_siswa', id_jurusan='$jurusan',kelas='$kelas',indeks='$indeks', nama_ortu='$nama_ortu', no_ortu='$no_ortu', alamat='$alamat', poin='$poin' WHERE nis='$id'");

  if($update){
    header ("location:../admin/datasiswa_admin.php");
    
  }else{

    header ("location:../admin/update_datasiswa.php");
    
  }

  ?>