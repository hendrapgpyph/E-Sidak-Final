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
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="shorcut icon" href="../img/esidak2.png">

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

<div class="container-fluid">
        <div class="jumbotron-list">
          <h2 class="text-center">BLACKLIST</h2>
      </div>
    </div>

<!--Welcome-->
<div class="wrapper">
  <div class="container-fluid container-button-cetak-rb">
    <div class="col-md-12 btn-group">
      <button type="button" name="button" class="btn btn-cw">
        <a href="../config/word_blacklist.php"><i class="fa fa-file-word-o"></i>&nbsp;Cetak Word</a>
      </button>
      <button type="button" name="button" class="btn btn-ce">
      <a href="../config/excel_blacklist.php"><i class="fa fa-file-excel-o"></i>&nbsp;Cetak Excel</a>
    </button>
    </div>
  </div>
<div class="container-fluid">


          <div class="col-md-12">
            <?php
            include "../config/koneksi.php";

            $sqll = mysqli_query($con,"select data_siswa.*, jurusan.singkatan from data_siswa join jurusan on data_siswa.id_jurusan=jurusan.id_jurusan where poin<=10") or die (mysqli_error());
            while($tampil = mysqli_fetch_array($sqll)){
              ?>
            <div class="container-panel">
              <table class="table table-custom">
              <tbody>
                <tr>
                  <td><h2><?php echo $tampil['nama_siswa']; ?></h2></td>
                </tr>
                <tr>
                  <td><h4><?php echo $tampil['kelas']." ".$tampil['singkatan']." ".$tampil['indeks']; ?> &nbsp;•&nbsp; <?php echo $tampil['poin']; ?>&nbsp;Poin</h4></td>
                </tr>
              </tbody>
              </table>

            </div>
            <?php
                  }
                ?>
          </div>
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
