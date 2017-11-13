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
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>E-Sidak | Aplikasi sidak siswa</title>

  <!-- style -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
  <link rel="shorcut icon" href="../img/esidak2.png">

  <!-- script -->
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default navbar-custom">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="admin_home.php"><img src="../img/esidak2.png" alt=""></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="admin_home.php">Home</a></li>
          <li><a href="riwayat_admin.php">Riwayat</a></li>
          <li><a href="blacklist_admin.php">Blacklist</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tabel Database<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="datasiswa_admin.php">Tabel Data Siswa</a></li>
                  <li><a href="jurusan_admin.php">Tabel Jurusan</a></li>
                  <li><a href="pelanggaran_admin.php">Tabel Pelanggaran</a></li>
                  <li><a href="user_admin.php">Tabel User</a></li>
              </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#u">Hi, <?php echo $data['username']; ?></a></li>
          <li><a href="../config/logout.php">Logout &nbsp;<i class="fa fa-sign-out"></i></a></li>
        </ul>
      </div>
    </nav>

      </div> <!--ROW-->
    </div> <!--BOX-->
    </div> <!--container-fluid-->

    <!--Welcome-->
    <div class="wrapper">
        <div class="container" style="margin-top:8%; margin-bottom:10%;">
            <center>
            <h1>"Hai Admin"</h1>
            <h3>Selamat datang dan selamat bertugas</h3>
                <hr style="border:1px solid yellow; width:50%; margin-top:2%; margin-bottom:3%;">
                <hr style="border:1px solid yellow; width:30%; margin-top:2%; margin-bottom:3%;">
            <h4>Silahkan pilih tabel yang ingin di proses</h4>
            <a class="btn btn-default" href="datasiswa_admin.php">Tabel Data Siswa</a>
            <a class="btn btn-default" href="jurusan_admin.php">Tabel Jurusan</a>
            <a class="btn btn-default" href="pelanggaran_admin.php">Tabel Pelanggaran</a>
            <a class="btn btn-default" href="user_admin.php">Tabel User</a>
            </center>
        </div>
</div>
    <footer>
      <p>Copyright &copy; 2017 E-Sidak</p>
    </footer>
</body>
</html>
<?php
}
?>
