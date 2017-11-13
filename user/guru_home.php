<!DOCTYPE html>
<?php
@session_start();
include "../config/koneksi.php";

if(@$_SESSION['admin'] || @$_SESSION['guru']|| @$_SESSION['osis']) {
?>
<?php

if(@$_SESSION['admin']) {
  $userlogin = @$_SESSION['admin'];
  $href="../admin/admin_home.php";

 } else if(@$_SESSION['guru']) {
  $userlogin = @$_SESSION['guru'];
  $href="guru_home.php";
 }else{
  $userlogin = @$_SESSION['osis'];
  $href="osis_home.php";
 }

 $sql = mysqli_query($con,"select * from user where username = '$userlogin'") or die (mysql_error());

 $data = mysqli_fetch_array($sql);
?>
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#000">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#000">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#000">

  <title>E-Sidak | Aplikasi sidak siswa</title>

  <!-- style -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="../js/jquery-ui.css" />
  <link rel="shorcut icon" href="../img/esidak2.png">

  <!-- script -->
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $(function() {
    $("#siswa").autocomplete({
      source:"../config/autocomplete.php",
      minLength:1,
    });
  });
  </script>
  <script src="../js/jquery-ui.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>
  </head>
  <body>
    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div>

    <nav class="navbar navbar-default navbar-custom">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand"><img src="../img/esidak2.png" alt=""></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
           <li><a href="<?php echo $href;?>">Home</a></li>
          <li><a href="riwayat.php">Riwayat</a></li>
          <li><a href="blacklist.php">Blacklist</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="sistem_info_siswa.php">SI Siswa</a></li>
          <li><a href="#u">Hi, <?php echo $data['username']; ?></a></li>
          <li><a href="../config/logout.php">Logout &nbsp;<i class="fa fa-sign-out"></i></a></li>
        </ul>
      </div>
    </nav>

<form action="pencarian.php" method="post">
    <div class="container-fluid">
      <div class="frame-cari">
        <div class="row">

        <div class="col-md-8 col-sm-8">
          <div class="input-group">
            <input type="text" id="siswa" class="form-control" name="cari" placeholder="Cari Nama / NIS..." required>
            <span class="input-group-btn">
              <button class="btn btn-warning" type="submit">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
            </div>
          </div>
        </form>

      </div> <!--ROW-->
    </div> <!--BOX-->
    </div> <!--container-fluid-->

    <div class="container-fluid">
        <div class="jumbotron-home">
          <h2 class="text-center">Kelas yang ingin disidak ?</h2>
      </div>
    </div>

    <div class="container-fluid">
      <div class="box">
        <div class="row frame-pilih-kelas">

        <a href="kelas10.php?kelas=10">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="list-kelas">
            <h3>X</h3>
          </div>
        </div>
        </a>

        <a href="kelas11.php?kelas=11">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="list-kelas">
            <h3>XI</h3>
          </div>
        </div>
        </a>

        <a href="kelas12.php?kelas=12">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="list-kelas">
              <h3>XII</h3>
            </div>
          </div>
        </a>
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
