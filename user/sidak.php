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

<?php
}
?>
<div class="container-fluid">
    <div class="jumbotron-list">
      <h2 class="text-center">
        <?php
          $kelas = isset($_GET['kelas']) ? $_GET['kelas']:false ;
         ?>
        <select class="" name="" onchange="location = this.value;">
          <option value="kelas10.php?kelas=10" <?php if($kelas == "10") echo "selected disabled"; ?>>Kelas X</option>
          <option value="kelas11.php?kelas=11" <?php if($kelas == "11") echo "selected disabled"; ?>>Kelas XI</option>
          <option value="kelas12.php?kelas=12" <?php if($kelas == "12") echo "selected disabled"; ?>>Kelas XII</option>
        </select>
      </h2>
  </div>
</div>
<?php
include "../config/koneksi.php";
$id = $_GET['id'];
$indeks = $_GET['indeks'];
$kelas = $_GET['kelas'];
?>

<form action="../config/sidak.php?id=<?php echo $id;?>&indeks=<?php echo $indeks;?>&kelas=<?php echo $kelas;?>" method="post">
    <div class="container-fluid">
      <div class="box frame-cari2">
        <div class="row">
        <div class="col-md-4 col-sm-4">
          <div class="form-group">
            <label for="cari">Sidak</label>
            <select class="form-control select-custom-sidak" id="pilih" name="nama_sidak">
              <?php
            include "../config/koneksi.php";

            $sqll = mysqli_query($con,"select * from pelanggaran") or die(mysqli_error());
            while($tampil2 = mysqli_fetch_array($sqll)){

              ?>
              <option value="<?php echo $tampil2['nama_pelanggaran'];?>"><?php echo $tampil2['nama_pelanggaran'];?>

              </option>
              <?php
            }
            ?>
            </select>
          </div>
        </div>
        <!-- <div class="col-md-8 col-sm-8">
          <div class="input-group">
            <input type="text" class="form-control" name="nama" placeholder="Cari Nama / NIS...">
            <span class="input-group-btn">
              <button class="btn btn-warning" type="submit" name="cari">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
            </div>
          </div> -->
        </div> <!--ROW-->
      </div> <!--BOX-->
    </div> <!--container-fluid-->

    <div class="container-fluid">
      <div class="box">
        <div class="row">
        <div class="col-md-12 col-sm-12 table-siswa">
          <?php
          include "../config/koneksi.php";
          $id = $_GET['id'];
          $indeks = $_GET['indeks'];
          $sqll = mysqli_query($con,"select * from jurusan where id_jurusan = '$id'") or die(mysqli_error());
            while($tampil = mysqli_fetch_array($sqll)){
          ?>
          <label><h3><?php echo $tampil['nama_jurusan'];?> <?php echo $indeks;?></h3></label>
          <?php
            }
          ?>
          <label><a href="kelas<?= $kelas; ?>.php?kelas=<?= $kelas ?>">Pilih Jurusan lain</a></label>

          <div class="v-scroll">

          <table class="table table-striped ">
            <thead>
              <tr>
                <th>No</th>
                <th>NIS</th>
                <th id="long">Nama Siswa</th>
                <th>POIN</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
            include "../config/koneksi.php";
            $id = $_GET['id'];
            $indeks = $_GET['indeks'];
            $kelas = $_GET['kelas'];
            $no = 1;
            if(isset($_GET['nama'])) {
              $nama = $_GET['nama'];
            $sqll = mysqli_query($con,"SELECT * FROM `data_siswa` WHERE CONCAT(`nis`,`nama_siswa`)LIKE'%$nama%'AND `id_jurusan`='$id' AND `indeks`='$indeks' AND `kelas`='$kelas'") or die(mysqli_error());
            }else{
              $sqll = mysqli_query($con,"select * from data_siswa where id_jurusan='$id' and indeks='$indeks' and kelas='$kelas'") or die(mysqli_error());
            }
            while($tampil = mysqli_fetch_array($sqll)){

              ?>
                <tr>
                  <input type="hidden" name="penyidak" value="<?php echo $data['nama']; ?>">
                  <td><?php echo $no;?></td>
                  <td><?php echo $tampil['nis']; ?></td>
                  <td><?php echo $tampil['nama_siswa']; ?></td>
                  <td><?php echo $tampil['poin'];?></td>
                  <td id="checkbox-sidak">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="box[]" value="<?php echo $tampil['nis'];?>">
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                      </label>
                    </div>
                  </td>
                </tr>
                <?php
                $no++;
                  }
                ?>
            </tbody>
          </table>
          </div>
          <input class="btn btn-custom kirim" type="submit" name="kirim" value="kirim" onclick="return confirm('Apakah anda yakin?')">
        </div>
      </div>
      </div>
    </div>
  </form>

  <footer>
    <p>Copyright &copy; 2017 E-Sidak</p>
  </footer>
  </body>
</html>
