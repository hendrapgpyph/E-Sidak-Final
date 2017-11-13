<?php
include "koneksi.php";
$naik_kelas10 = mysqli_query($con,"UPDATE data_siswa SET kelas=kelas+1 , poin=100");
$delete_kelas12 = mysqli_query($con,"DELETE FROM data_siswa WHERE kelas=13");
echo "<script>alert(\"Sukses!\");
    location.href = \"../admin/datasiswa_admin.php\";</script>";
?>