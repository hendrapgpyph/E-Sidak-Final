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
    <title>E-Sidak | Aplikasi sidak siswa</title>

  <!-- style -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
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
        <a class="navbar-brand" href="#"><img src="../img/esidak2.png" alt=""></a>
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

    <div class="container-fluid">
        <div class="jumbotron-list">
          <h2 class="text-center">TAMBAH SISWA</h2>
      </div>
    </div>


    <div class="container-fluid">
          <div class="col-md-12">

            <div class="container-panel-detail form-content">
              <table class="table table-custom">

              <?php
                include "../config/koneksi.php";
                $ambilkelas = $_GET['kelas'];
                $ambiljurusan = $_GET['jurusan'];
                $ambilindeks = $_GET['indeks'];
              ?>

              <form action="tambah_siswa.php?kelas=<?php echo $ambilkelas;?>&jurusan=<?php echo $ambiljurusan;?>&indeks=<?php echo $ambilindeks;?>" method="post">

              <tbody>
                <tr>
                  <th>NIS</th>
                  <td>: <input type="text" name="nis" class="form-control form-control-custom" required></td>
                </tr>

                <tr>
                  <th>Nama</th>
                  <td>: <input type="text" name="nama_siswa" class="form-control form-control-custom" required></td>
                </tr>

                <tr>
                  <th>Poin</th>
                  <td>: <input type="number" name="poin" class="form-control form-control-custom" min="1" max="100" required></td>
                </tr>

                <tr>
                  <td><hr></td>
                </tr>

                <tr>
                  <th>Nama Orang Tua</th>
                  <td>: <input type="text" name="nama_ortu" class="form-control form-control-custom" required></td>
                </tr>

                <tr>
                  <th>No.Hp</th>
                  <td>: <input type="text" name="no_ortu" class="form-control form-control-custom" required></td>
                </tr>

                <tr>
                  <th>Alamat</th>
                  <td>: <input type="text" name="alamat" class="form-control form-control-custom" required></td>
                </tr>

              </tbody>

              </table>
            </div>
      </div>
    </div>
    <div class="container-fluid container-button-update">

        <div class="col-md-12 ">
          <button class="btn btn-update" type="submit"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Insert</button>
          <a href="sistem_info_siswa.php?kelas=<?php echo $ambilkelas;?>&jurusan=<?php echo $ambiljurusan;?>&indeks=<?php echo $ambilindeks;?>" class="btn-back-r"><i class="fa fa-arrow-left"></i></a>
        </div>

    </div>
    </form>

    <footer>
      <p>Copyright &copy; 2017 E-Sidak</p>
    </footer>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
?>
