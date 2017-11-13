<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="js/jquery-ui.css" />
    <link rel="shorcut icon" href="img/esidak2.png">

    <!-- script -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(function() {
      $("#siswa").autocomplete({
        source:"config/autocomplete2.php",
        minLength:1,
      });
    });
    </script>
    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>

    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div>

    <nav class="navbar navbar-default navbar-custom-user cs">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand"><img src="img/esidak2.png" alt=""></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="index.html">Home</a></li>
          <li><span id="slash">/</span></li>
          <li><a href="about_us.html">Tentang Kami</a></li>
        </ul>
        <!-- <ul class="nav navbar-nav navbar-right">
          <li><a href="#k">Informasi &nbsp;<i class="fa fa-info-circle"></i></a></li>
        </ul> -->
      </div>
    </nav>
<form action="cari_siswa.php" method="post">
    <div class="container-fluid pencarian">
      <div class="frame-cari">
        <div class="row">
              <div class="col-md-8 col-sm-8">
          <div class="input-group">
            <input type="number" id="siswa" class="form-control" name="nis" placeholder="Masukkan NIS..." required>
            <span class="input-group-btn">
              <button class="btn btn-warning" type="submit" name="cari">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
            </div>
          </div>
      </div>
    </div>
    </div>
  </form>


<div class="wrapper-cs">
    <div class="container-fluid text-center">


<?php
include "config/koneksi.php";
if (isset($_POST['cari']) and ($_POST['nis'])) {
  $nis =  $_POST['nis'];
  $liatnis = mysqli_query($con,"select * from data_siswa where nis='$nis'");
  $cek_nis = mysqli_num_rows($liatnis);
  if ($cek_nis==0) {
    echo "<div class='space-cs'>
      <hr>
      <h4><b>NIS tidak ditemukan</b></h4>
    </div>";
  }else{
  $sqll = mysqli_query($con,"select * from data_siswa where nis='$nis'") or die(mysqli_error());
                  while($tampil = mysqli_fetch_array($sqll)){
?>
        <div class="panel panel-default">
            <div class="panel-heading"><h2><?php echo $tampil['nama_siswa']; ?></h2></div>
            <div class="panel-body">Poin Anda : <b><?php echo $tampil['poin']?></b></div>
        </div>

        <div class="space-cs">
          <hr>
          <h4><b>Riwayat Sidak Anda</b></h4>
        </div>

        <?php
              $sqll = mysqli_query($con,"select riwayat.*, user.nama, pelanggaran.nama_pelanggaran from riwayat
                join user on riwayat.id_user=user.id_user
                join pelanggaran on riwayat.id_pelanggaran=pelanggaran.id_pelanggaran where nis='$nis' ORDER by id desc") or die(mysqli_error());
              $nama = $tampil['nama_siswa'];
              if (mysqli_num_rows($sqll)==0) {
                echo "<center>tidak ada riwayat sidak</center>";
              }else{

              while($tampil = mysqli_fetch_array($sqll)){

            ?>
        <div class="container-panel">
          <a href="#">
          <table class="table table-custom">
          <tbody>

              <td><h4><b><?php echo $tampil['nama_pelanggaran']; ?></h4></td></tr>
            <tr>
            <td><h4>Pada Tanggal : <?php echo $tampil['tanggal']; ?></h4></td>
            </tr>
            <tr>
              <td><h4>Penyidak : <?php echo $tampil['nama']; ?></h4></td>
            </tr>
          </tbody>
          </table>
          </a>
        </div>
        <?php
            }
           }
          }
         }
      }else{
        echo "";
           }
           ?>

    </div>
    </div>
  <footer>
    <p>Copyright &copy; 2017 E-Sidak</p>
  </footer>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
