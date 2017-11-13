<?php
include "koneksi.php";
$nis = $_GET['nis'];
$id  = $_GET['id'];
$id_langgar = $_GET['id_langgar']; 

$langgar = mysqli_query($con,"SELECT * FROM pelanggaran WHERE id_pelanggaran='$id_langgar'");
while($tampil = mysqli_fetch_array($langgar)){
		$poin = $tampil['min_poin'];
	}

$btl_riwayat = mysqli_query($con,"DELETE FROM riwayat WHERE id='$id'");
$tambahin_poin = mysqli_query($con,"UPDATE data_siswa SET poin=poin+'$poin' WHERE nis='$nis'");

echo "<script>alert(\"Sukses!\");
    location.href = \"../user/riwayat.php\";</script>";


?>