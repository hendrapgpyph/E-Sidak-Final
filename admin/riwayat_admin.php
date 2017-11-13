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
        <link rel="stylesheet" href="../js/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="shorcut icon" href="../img/esidak2.png">

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
          <h2 class="text-center">RIWAYAT</h2>
      </div>
    </div>

<!--Welcome-->
<form function="riwayat_admin.php" method="post">
<div class="container-fluid">
  <div class="box frame-cari2">
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="form-group">
          <label for="cari"><i class="fa fa-filter"></i> Filter</label>
          <select class="form-control select-custom-riwayat" id="pilih" name="bulan">
                <option value="">Pilih...</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">June</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
        </div>
      </div>

      <div class="col-md-8 col-sm-8">
        <div class="input-container">
          <input type="text" class="form-control select" id="siswa" name="nama" placeholder="Cari Nama...">
          
            <button class="btn btn-warning" type="submit" name="cari">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          
          </div>
        </div>
    </div>
  </div>
</div>
</form>

    <div class="wrapper">
      <div class="container container-button-cetak-rb">
        <div class="col-md-12 btn-group">
          <button type="button" name="button" class="btn btn-cw">
            <a href="../config/word_riwayat.php"><i class="fa fa-file-word-o"></i>&nbsp;Cetak Word</a>
          </button>
          <button type="button" name="button" class="btn btn-ce">
          <a href="../config/excel_riwayat.php"><i class="fa fa-file-excel-o"></i>&nbsp;Cetak Excel</a>
        </button>
        </div>
      </div>
    <div class="container-fluid">
          <div class="col-md-12">

               <?php
                  include "../config/koneksi.php";
                  if (isset($_POST['cari']) and !($_POST['nama'])) {

                    if (!($_POST['bulan'])) {
                      $sqll = mysqli_query($con,"select riwayat.*, data_siswa.nama_siswa, user.nama, pelanggaran.nama_pelanggaran from riwayat
                            join data_siswa on riwayat.nis=data_siswa.nis
                            join user on riwayat.id_user=user.id_user
                            join pelanggaran on riwayat.id_pelanggaran=pelanggaran.id_pelanggaran order by id desc") or die(mysqli_error());
                    }else{
                    $bulan = $_POST['bulan'];
                    $sqll = mysqli_query($con,"select riwayat.*, data_siswa.nama_siswa, user.nama, pelanggaran.nama_pelanggaran from riwayat
                            join data_siswa on riwayat.nis=data_siswa.nis
                            join user on riwayat.id_user=user.id_user
                            join pelanggaran on riwayat.id_pelanggaran=pelanggaran.id_pelanggaran where MONTH(tanggal)='$bulan' ORDER BY tanggal DESC") or die(mysqli_error());
                  }
                }elseif (isset($_POST['cari']) and ($_POST['nama'])) {
                  $nama = $_POST['nama'];
                    $cek  = mysqli_num_rows(mysqli_query($con,"SELECT `riwayat`.*, `data_siswa`.nama_siswa, `user`.nama, `pelanggaran`.nama_pelanggaran FROM `riwayat`
                      JOIN `data_siswa` ON `riwayat`.nis=`data_siswa`.nis
                      JOIN `user` ON `riwayat`.id_user=`user`.id_user
                      JOIN `pelanggaran` ON `riwayat`.id_pelanggaran=`pelanggaran`.id_pelanggaran
                      WHERE CONCAT(`nama_siswa`)LIKE'%$nama%' ORDER BY tanggal DESC"));
                  if ($cek == 0) {
                    $sqll= mysqli_query($con,"select riwayat.*, data_siswa.nama_siswa from riwayat join data_siswa on riwayat.nis=data_siswa.nis where nama_siswa='$nama'");
                    echo "<center><h3>- Nama tidak ada dalam riwayat -</h3></center>";
                  }else{
                    $sqll = mysqli_query($con,"SELECT `riwayat`.*, `data_siswa`.nama_siswa, `user`.nama, `pelanggaran`.nama_pelanggaran FROM `riwayat`
                      JOIN `data_siswa` ON `riwayat`.nis=`data_siswa`.nis
                      JOIN `user` ON `riwayat`.id_user=`user`.id_user
                      JOIN `pelanggaran` ON `riwayat`.id_pelanggaran=`pelanggaran`.id_pelanggaran
                      WHERE CONCAT(`nama_siswa`)LIKE'%$nama%' ORDER BY tanggal DESC") or die(mysqli_error());
                  }
                }else{
                  $sqll = mysqli_query($con,"select riwayat.*, data_siswa.nama_siswa, user.nama, pelanggaran.nama_pelanggaran from riwayat
                            join data_siswa on riwayat.nis=data_siswa.nis
                            join user on riwayat.id_user=user.id_user
                            join pelanggaran on riwayat.id_pelanggaran=pelanggaran.id_pelanggaran order by id desc") or die(mysqli_error());
                }
                  while($tampil = mysqli_fetch_array($sqll)){
                    ?>

                  <div class="container-panel">
                    <a href="detail_riwayat.php?id=<?php echo $tampil['id']; ?>">


                    <table class="table table-custom">

                    <tbody>
                      <tr>
                        <td><h2><?php echo $tampil['nama_siswa']; ?> / <?php echo $tampil['nama_pelanggaran']; ?></h2></td>
                      </tr>
                      <tr>
                      <td><h4><?php echo $tampil['nis']; ?>&nbsp;•&nbsp;<?php echo $tampil['tanggal']; ?>
                      </h4></td>
                      </tr>
                    </tbody>
                    </table>
                    </a>
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
