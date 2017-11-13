<!DOCTYPE html>
<?php
@session_start(); 
include "../config/koneksi.php";

if(@$_SESSION['admin'] || @$_SESSION['guru']|| @$_SESSION['osis']) { 
?>
<?php 

if(@$_SESSION['admin']) {
  $userlogin = @$_SESSION['admin'];

 } else if(@$_SESSION['guru']) {
  $userlogin = @$_SESSION['guru'];
 }else{
  $userlogin = @$_SESSION['osis'];
 }

 $sql = mysqli_query($con,"select * from user where username = '$userlogin'") or die (mysql_error());
 
 $data = mysqli_fetch_array($sql);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Admin E-Sidak SMK Negeri 1 Denpasar</title>
        
        <!--Style-->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="shorcut icon" href="../img/esidak2.png">
        
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
    </head>
    <body>
        
<!--Navbar-->
    <div class="container">
    <nav class="navbar navbar-default" style="margin-top:20px; background-color: yellow; border-color: grey">
        <div class="container-fluid" style="margin:1%;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-mobile" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="#">E-SIDAK</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li><a href="beranda_admin.php">Beranda</a></li>
                    <li><a href="riwayat_admin.php">Riwayat</a></li>
                    <li><a href="blacklist_admin.php">Blacklist</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tabel Database<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="datasiswa_admin.php">Tabel Data Siswa</a></li>
                            <li><a href="kelas_admin.php">Tabel Kelas</a></li>
                            <li><a href="pelanggaran_admin.php">Tabel Pelanggaran</a></li>
                            <li><a href="user_admin.php">Tabel User</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true">Logout</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
        
<!--Welcome-->
        <div class="container fonta" style="margin-top:8%; margin-bottom:10%;">
            <center>
            <h1>"Hai Admin"</h1>
            <h3>Selamat Datang dan Selamat Bertugas, Semoga Hari Mu Menyenangkan.</h3>
                <hr style="border:1px solid yellow; width:50%; margin-top:2%; margin-bottom:3%;">
                <hr style="border:1px solid yellow; width:30%; margin-top:2%; margin-bottom:3%;">
            <h4>Silahkan Pilih Tabel Yang ingin Kamu Kunjungi</h4>
            <a class="btn btn-default" href="datasiswa_admin.php">Tabel Data Siswa</a>
            <a class="btn btn-default" href="kelas_admin.php"  style="background-color:yellow;">Tabel Kelas</a>
            <a class="btn btn-default" href="pelanggaran_admin.php">Tabel Pelanggaran</a>
            <a class="btn btn-default" href="user_admin.php" style="background-color:yellow;">Tabel User</a>
            </center>
        </div>

    </body>
</html>
<?php
}
?>