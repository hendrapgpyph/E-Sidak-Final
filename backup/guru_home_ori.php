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

 $sql = mysqli_query($con,"select * from user where username = '$userlogin'") or die(mysql_error());
 
 $data = mysqli_fetch_array($sql);
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>E-Sidak | Aplikasi sidak siswa</title>

  <!-- style -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="shorcut icon" href="../img/esidak2.png">

  <!-- script -->
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>

  </head>
  <body id="home">
    <nav class="navbar navbar-default navbar-custom">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $href;?>"><img src="../img/esidak2.png" alt=""></a>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="col-md-12 col-sm-12 col-xs-12 pilih-halaman">
        <a href="sistem_info_siswa.php">
        <div class="text text1">
          <h2>Halaman Informasi Siswa</h2>
        </div>
        </a>

        <a href="index2.php">
        <div class="text text2">
          <h2>Halaman Sidak</h2>
        </div>
        </a>
      </div>
    </div>

    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
?>