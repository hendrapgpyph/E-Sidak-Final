<!DOCTYPE html>
<?php
error_reporting(0);
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
          <h2 class="text-center">SISTEM INFORMASI SISWA</h2>
      </div>
    </div>



<form action="sistem_info_siswa.php" method="post">
    <div class="container-fluid">
      <div class="box frame-cari2 text-center">
        <div class="row">
        <div class="col-md-4 col-sm-4">
          <div class="form-group">
            <label for="cari">Kelas</label>
            <select class="form-control select-custom-si" id="pilih" name="kelas" required>
              <option value="">Pilih...</option>
              <option value="10">X</option>
              <option value="11">XI</option>
              <option value="12">XII</option>
            </select>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="form-group">
            <label for="cari">Jurusan</label>
            <select class="form-control select-custom-si" id="pilih" name="jurusan" required>
              <option value="">Pilih...</option>
              <?php
              include "../config/koneksi.php";
              $sql = mysqli_query($con,"select * from jurusan");
              while ($tampil = mysqli_fetch_array($sql)) {
              ?>
              <option value="<?php echo $tampil['id_jurusan'];?>"><?php echo $tampil['nama_jurusan'];?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="form-group">
            <label for="cari">Indeks</label>
            <select class="form-control select-custom-si" id="pilih" name="indeks" required>
              <option value="">Pilih...</option>
              <option value="1"> 1 </option>
              <option value="2"> 2 </option>
              <option value="3"> 3 </option>
            </select>

          </div>
        </div>
</form>
        </div> <!--ROW-->
        <div class="row">
          <div class="col-md-12 si">
            <span class="input-group-btn si">
              <button class="btn btn-warning" type="submit" name="cari">
                <span class="glyphicon glyphicon-search"></span>
              </button>
              </span>
          </div>
        </div>

      </div> <!--BOX-->
    </div> <!--container-fluid-->
    <div class="wrapper">


            <?php
            include "../config/koneksi.php";
            if (isset($_POST['kelas']) and $_POST['jurusan'] and $_POST['indeks']) {
                $no = 1;
                $kelas = $_POST['kelas'];
                $jurusan = $_POST['jurusan'];
                $indeks = $_POST['indeks'];
                $sqll = mysqli_query($con,"select * from data_siswa where kelas='$kelas' and id_jurusan='$jurusan' and indeks='$indeks'");
                $cek  = mysqli_num_rows($sqll);
                if ($cek==0) {
                  echo "<center> Tidak ada siswa di kelas ini!<br>";
                  echo "<a href='insert_siswa.php?kelas=".$kelas."&jurusan=".$jurusan."&indeks=".$indeks."'>Tambah Siswa</a>";
                }else{
                  $no = 1;
                  $kelas = $_POST['kelas'];
                  $jurusan = $_POST['jurusan'];
                  $indeks = $_POST['indeks'];
                  $sqll = mysqli_query($con,"select * from data_siswa where kelas='$kelas' and id_jurusan='$jurusan' and indeks='$indeks'");
                  ?>

      <div class="container-fluid">
      <div class="box">
        <div class="row">
        <div class="col-md-12 col-sm-12 table-siswa">
          <?php
              include "../config/koneksi.php";
              $sql = mysqli_query($con,"select * from jurusan where id_jurusan='$jurusan'");
              while ($tampil = mysqli_fetch_array($sql)) {
              ?>
          <label><h3><?php echo $kelas;?> <?php echo $tampil['nama_jurusan'];?> <?php echo $indeks;?> </h3></label>
              <?php } ?>
              <br>

              <a href="insert_siswa.php?kelas=<?php echo $kelas;?>&jurusan=<?php echo $jurusan;?>&indeks=<?php echo $indeks;?>">

                <button class="btn btn-warning btn-tambah" type="button">
                  <i class="fa fa-plus" aria-hidden="true"></i>
              </button></a>

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
              <?php
                while($tampil = mysqli_fetch_array($sqll)){
              ?>
                <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $tampil['nis'];?></td>
                <td><?php echo $tampil['nama_siswa'];?></td>
                <td><?php echo $tampil['poin'];?></td>
                <td id="action-si"><a href="edit_siswa.php?nis=<?php echo $tampil['nis'];?>&kelas=<?php echo $kelas;?>&jurusan=<?php echo $jurusan;?>&indeks=<?php echo $indeks;?>"><i class="fa fa-edit"></i></a>
                  <a href="delete_datasiswa.php?nis=<?php echo $tampil['nis'];?>&kelas=<?php echo $kelas;?>&jurusan=<?php echo $jurusan;?>&indeks=<?php echo $indeks;?>"><i class="fa fa-close"></i></a></td>
              </tr>
              <?php
              $no++;
                }
              ?>
            </tbody>
          </table>
            <?php
                }
            }elseif (!($_GET['kelas']) and !($_GET['indeks']) and !($_GET['jurusan'])) {
                 echo "";
            }else{
                $no = 1;
                $kelas = $_GET['kelas'];
                $jurusan = $_GET['jurusan'];
                $indeks = $_GET['indeks'];
                $sqll = mysqli_query($con,"select * from data_siswa where kelas='$kelas' and id_jurusan='$jurusan' and indeks='$indeks'");
            ?>
        <div class="container-fluid">
        <div class="box">
        <div class="row">
        <div class="col-md-12 col-sm-12 table-siswa">
           <?php
              include "../config/koneksi.php";
              $kelas = $_GET['kelas'];
              $jurusan = $_GET['jurusan'];
              $indeks = $_GET['indeks'];
              $sql = mysqli_query($con,"select * from jurusan where id_jurusan='$jurusan'");
              while ($tampil = mysqli_fetch_array($sql)) {
              ?>
          <label><h3><?php echo $kelas;?> <?php echo $tampil['nama_jurusan'];?> <?php echo $indeks;?> </h3></label>
              <?php } ?>
              <br>
              <a href="insert_siswa.php?kelas=<?php echo $kelas;?>&jurusan=<?php echo $jurusan;?>&indeks=<?php echo $indeks;?>">
                <button class="btn btn-warning btn-tambah" type="button">
                  <i class="fa fa-plus" aria-hidden="true"></i>
              </button></a>

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
              <?php
                while($tampil = mysqli_fetch_array($sqll)){
              ?>
                <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $tampil['nis'];?></td>
                <td><?php echo $tampil['nama_siswa'];?></td>
                <td><?php echo $tampil['poin'];?></td>
                <td id="action-si"><a href="edit_siswa.php?nis=<?php echo $tampil['nis'];?>&kelas=<?php echo $kelas;?>&jurusan=<?php echo $jurusan;?>&indeks=<?php echo $indeks;?>"><i class="fa fa-edit"></i></a>
                  <a href="delete_datasiswa.php?nis=<?php echo $tampil['nis'];?>&kelas=<?php echo $kelas;?>&jurusan=<?php echo $jurusan;?>&indeks=<?php echo $indeks;?>"><i class="fa fa-close"></i></a>
                </td>
              </tr>
              <?php
              $no++;
                }
              ?>
            </tbody>
          </table>
            <?php
            }
            ?>

        </div>
      </div>
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
