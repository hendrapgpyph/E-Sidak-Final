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
  <body>
    <nav class="navbar navbar-default navbar-custom">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $href;?>"><img src="../img/esidak2.png" alt=""></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="guru_home.php">Home</a></li>
          <li><a href="#r">Riwayat</a></li>
          <li><a href="#b">Blacklist</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#u">Hy, <?php echo $data['nama']; ?></a></li>
          <li><a href="../config/logout.php">Logout &nbsp;<i class="fa fa-sign-out"></i></a></li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
        <div class="jumbotron-list">
          <h2 class="text-center">SISTEM INFORMASI SISWA</h2>
      </div>
    </div>


    <div class="container-fluid">
      <div class="box frame-cari2">
        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="cari">Kelas</label>
            <select class="form-control select-custom" id="cari">
              <option>Pilih...</option>
              <option value="">Teknik Gambar Bangunan</option>
              <option value="">Teknik Konstruksi Batu Beton</option>
              <option value="">Teknik Konstruksi Kayu</option>
              <option value="">Teknik Elektronika Komunikasi</option>
              <option value="">Teknik Instalasi Pemanfaatan Tenaga Listrik</option>
              <option value="">Teknik Pendingin dan Tata Udara</option>
              <option value="">Teknik Pemesinan</option>
              <option value="">Teknik Kendaraan Ringan</option>
              <option value="">Teknik Kendaraan Ringan</option>
              <option value="">Rekayasa Perangkat Lunak</option>
              <option value="">Teknik Komputer Jaringan</option>
              <option value="">Multimedia</option>
            </select>
          </div>
        </div>

        <div class="col-md-8">
          <div class="input-group">
            <input type="text" class="form-control" name="cari" placeholder="Cari Nama...">
            <span class="input-group-btn">
              <button class="btn btn-warning" type="button">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
            </div>
          </div>

        </div> <!--ROW-->
      </div> <!--BOX-->
    </div> <!--container-fluid-->

    <div class="container-fluid">
      <div class="box">
        <div class="row">
        <div class="col-md-12 col-sm-12 table-siswa">
          <label><h3>Rekayasa Perangkat Lunak</h3></label>
          <table class="table table-striped ">
            <thead>
              <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Poin</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>24938</td>
                <td>Dwiky Chandra Hidayat</td>
                <td>100</td>
                <td id="checkbox-info"><i class="fa fa-edit"></td>
              </tr>

              <tr>
                <td>2</td>
                <td>24938</td>
                <td>Dwiky Chandra Hidayat</td>
                <td>80</td>
                <td id="checkbox-info"><i class="fa fa-edit"></td>
              </tr>

              <tr>
                <td>3</td>
                <td>24938</td>
                <td>Dwiky Chandra Hidayat</td>
                <td>80</td>
                <td id="checkbox-info"><i class="fa fa-edit"></td>
              </tr>

              <tr>
                <td>4</td>
                <td>24938</td>
                <td>Dwiky Chandra Hidayat</td>
                <td>80</td>
                <td id="checkbox-info"><i class="fa fa-edit"></td>
              </tr>

              <tr>
                <td>5</td>
                <td>24938</td>
                <td>Dwiky Chandra Hidayat</td>
                <td>80</td>
                <td id="checkbox-info"><i class="fa fa-edit"></td>
              </tr>

              <tr>
                <td>6</td>
                <td>24938</td>
                <td>Dwiky Chandra Hidayat</td>
                <td>80</td>
                <td id="checkbox-info"><i class="fa fa-edit"></i></td>
              </tr>

              <tr>
                <td>7</td>
                <td>24938</td>
                <td>Dwiky Chandra Hidayat</td>
                <td>80</td>
                <td id="checkbox-info"><i class="fa fa-edit"></td>
              </tr>

              <tr>
                <td>8</td>
                <td>24938</td>
                <td>Dwiky Chandra Hidayat</td>
                <td>80</td>
                <td id="checkbox-info"><i class="fa fa-edit"></td>
              </tr>

              <tr id="blacklist">
                <td>9</td>
                <td>24938</td>
                <td>Dwiky Chandra Hidayat</td>
                <td>10</td>
                <td id="checkbox-info"><i class="fa fa-edit"></td>
              </tr>

              <tr>
                <td>10</td>
                <td>24938</td>
                <td>Dwiky Chandra Hidayat</td>
                <td>80</td>
                <td id="checkbox-info"><i class="fa fa-edit"></td>

              </tr>
            </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
?>
