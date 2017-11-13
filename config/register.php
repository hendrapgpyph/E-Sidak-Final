<?php
	include 'koneksi.php';
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$level = $_POST['level'];

mysql_query("INSERT INTO user VALUES('', '$nama', '$username', '$pass', '$level')");

header("location:../admin/user_admin.php?pesan=input");
?>