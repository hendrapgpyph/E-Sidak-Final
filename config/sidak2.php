<?php
@session_start();
error_reporting(0);
include 'koneksi.php';


if(@$_SESSION['admin']) {
  $userlogin = @$_SESSION['admin'];
  $href="../admin/index1.php";

 } else if(@$_SESSION['guru']) {
  $userlogin = @$_SESSION['guru'];
  $href="guru_home.php";
 }else{
  $userlogin = @$_SESSION['osis'];
  $href="osis_home.php";
 }


if(isset($_POST['kirim']))
{
  if(!($_POST['box'])) {
	echo "<script>alert(\"Harap centang nama yang ingin disidak !\");
    location.href = \"../user/".$href."\";</script>";
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
	$sql = mysqli_query($con,"UPDATE data_siswa set poin=poin-'$poin' where nis='$id[$i]' ");
	$sql2 = mysqli_query($con,"INSERT INTO riwayat VALUES('', '$yangnyidak', '$id[$i]', '$pelanggarannya', '$date')");
	}echo "<script>alert(\"Sukses!\");
    location.href = \"../user/".$href."\";</script>";
}
}
?>
