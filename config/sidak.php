<?php
error_reporting(0);
include 'koneksi.php';
if ($_POST['nama']) {
	$nama = $_POST['nama'];
	
	 header("location:../user/sidak.php?id=".$id_jurusan."&indeks=".$indeks."&kelas=".$kelas."&nama=".$nama);
}elseif(isset($_POST['kirim']))
{	
	if(!($_POST['box'])) {
	$id_jurusan = $_GET['id'];
	$indeks = $_GET['indeks'];
	$kelas = $_GET['kelas'];
	echo "<script>alert(\"Harap centang nama yang ingin disidak !\");
    location.href = \"../user/sidak.php?id=".$id_jurusan."&indeks=".$indeks."&kelas=".$kelas."\";</script>";
	}else{
    $id = $_POST['box'];
 	$cnt=count($id);
 	$pelanggaran = $_POST['nama_sidak'];
 	$namapenyidak = $_POST['penyidak'];
 	$date = date('Y-m-d');

	$sql = mysqli_query($con,"select * from user where nama='$namapenyidak'") or die(mysqli_error());
 	while ($tampil = mysqli_fetch_array($sql)) {
 		$yangnyidak = $tampil['id_user'];
 	}

 	$sqll = mysqli_query($con,"select * from pelanggaran where nama_pelanggaran='$pelanggaran'") or die(mysqli_error());
 	while ($tampil2 = mysqli_fetch_array($sqll)) {
 		$poin = $tampil2['min_poin'];
 		$pelanggarannya = $tampil2['id_pelanggaran'];
 	}

for ($i=0; $i < $cnt ; $i++) {
	$id_jurusan = $_GET['id'];
	$indeks = $_GET['indeks'];
	$kelas = $_GET['kelas'];
	$sql = mysqli_query($con,"UPDATE data_siswa set poin=poin-'$poin' where nis='$id[$i]' ");
	$sql2 = mysqli_query($con,"INSERT INTO riwayat VALUES('', '$yangnyidak', '$id[$i]', '$pelanggarannya', '$date')");
	}
	header("location:../user/sidak.php?id=".$id_jurusan."&indeks=".$indeks."&kelas=".$kelas);
}
}
?>