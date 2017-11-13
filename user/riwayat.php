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

$sql = mysqli_query($con,"select * from user where username = '$userlogin'") or die(mysql_error());

 $data = mysqli_fetch_array($sql);
?>
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
          <?php
            if(@$_SESSION['guru']) {
            echo "<li><a href='sistem_info_siswa.php'>SI Siswa</a></li>";
           }else{
            echo "";
           }
          ?>
          <li><a href="#u">Hi, <?php echo $data['username']; ?></a></li>
          <li><a href="../config/logout.php">Logout &nbsp;<i class="fa fa-sign-out"></i></a></li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
        <div class="jumbotron-list">
          <h2 class="text-center">RIWAYAT</h2>
      </div>
    </div>

    <div class="wrapper">

<form function="riwayat.php" method="post">
    <div class="container-fluid">
      <div class="box frame-cari2">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="form-group">
              <label for="cari"><i class="fa fa-filter"></i> Filter</label>
              <select class="form-control select-custom-riwayat" id="pilih" name="bulan">
                <option value="0">Pilih...</option>
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
              <input type="text" name="nama" id="siswa" class="form-control select" placeholder="Cari Nama...">

                <button class="btn btn-warning" type="submit" name="cari">
                  <span class="glyphicon glyphicon-search"></span>
                </button>

              </div>
            </div>
        </div>
      </div>
    </div>
</form>
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
                    }else {
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


                    <table class="table table-custom r">

                      <tbody>
                        <tr>
                          <td><h2><?php echo $tampil['nama_siswa']; ?></h2></td>
                        </tr>
                        <tr>
                              <td><h4>(<?php echo $tampil['nama_pelanggaran']; ?>)</h4></td></tr>
                        <tr>
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
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
?>
