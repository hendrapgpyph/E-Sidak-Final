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
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="shorcut icon" href="../img/esidak2.png">

  <!-- script -->
  <script type="text/javascript" src="../js/jquery.js"></script>
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
          <li><a href="#u">Hi, <?php echo $data['username']; ?></a></li>
          <li><a href="../config/logout.php">Logout &nbsp;<i class="fa fa-sign-out"></i></a></li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
        <div class="jumbotron-list">
          <h2 class="text-center">DETAIL RIWAYAT</h2>
      </div>
    </div>

<?php
include "../config/koneksi.php";
$id = $_GET['id'];
$sqll = mysqli_query($con,"select riwayat.*, data_siswa.nama_siswa, user.nama, pelanggaran.nama_pelanggaran from riwayat
                            join data_siswa on riwayat.nis=data_siswa.nis
                            join user on riwayat.id_user=user.id_user
                            join pelanggaran on riwayat.id_pelanggaran=pelanggaran.id_pelanggaran where id='$id'") or die(mysqli_error());
                  while($tampil = mysqli_fetch_array($sqll)){
?>
    <div class="wrapper">
    <div class="container-fluid">
          <div class="col-md-12">

            <div class="container-panel-detail">

              <table class="table table-custom">
              <tbody>
                <tr>
                  <th>NIS</th>
                  <td>: <?php echo $tampil['nis']; ?></td>
                </tr>

                <tr>
                  <th>Nama</th>
                  <td>: <?php echo $tampil['nama_siswa']; ?></td>
                </tr>

                <tr>
                  <th>Jenis Sidak</th>
                  <td>: <?php echo $tampil['nama_pelanggaran']; ?></td>
                </tr>

                <tr>
                  <th>Tanggal</th>
                  <td>: <?php echo $tampil['tanggal']; ?></td>
                </tr>

                <tr>
                  <th>Penyidak</th>
                  <td>: <?php echo $tampil['nama']; ?></td>
                </tr>
              </tbody>
              </table>
            </div>
            <div class="container-fluid container-button-undo">

                <div class="col-md-12 ">
                  <a href="../config/batal_sidak.php?nis=<?php echo $tampil['nis']; ?>&id=<?php echo $tampil['id']; ?>&id_langgar=<?php echo $tampil['id_pelanggaran']; ?>" onclick="return confirm('Apakah anda yakin?')"><button class="btn btn-undo" type="button"><i class="fa fa-undo"></i> Batal Sidak</button></a>
                </div>
            </div>
      </div>
    </div>
    </div>
    <a href="riwayat.php" class="btn-back-r"><i class="fa fa-arrow-left"></i></a>

    <footer>
      <p>Copyright &copy; 2017 E-Sidak</p>
    </footer>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php
  }
}
 ?>
