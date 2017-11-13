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

<form function="pencarian.php" method="post">
    <div class="container-fluid">
      <div class="frame-cari">
        <div class="row">

        <div class="col-md-8 col-sm-8">
          <div class="input-group">
            <?php
            $s = $_POST['cari'];
            ?>
            <input type="text" id="siswa" class="form-control" name="cari" value="<?php echo $s;?>" placeholder="Cari Nama / NIS..." required>
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
          <h2 class="text-center">Hasil Pencarian</h2>
      </div>
    </div>
    <form action="../config/sidak2.php?cari=<?php echo $s;?>" method="post">
      <div class="container-fluid">
        <div class="box">
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

            <div class="col-md-12 col-sm-12 table-siswa">
              <div class="v-scroll">
                <table class="table table-striped ">
                  <thead>
                    <tr>
                      <th>NIS</th>
                      <th id="long">Nama Siswa</th>
                      <th>Kelas</th>
                      <th>POIN</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

              <?php
            include "../config/koneksi.php";
            $s = $_POST['cari'];
            $sqll = mysqli_query($con,"SELECT`data_siswa`.*,`jurusan`.singkatan FROM `data_siswa` JOIN `jurusan` ON `data_siswa`.id_jurusan=`jurusan`.id_jurusan
              WHERE CONCAT(`nis`,`nama_siswa`)LIKE'%$s%'") or die(mysqli_error());
            $cek = mysqli_num_rows($sqll);
            if ($cek==0) {
              $sqll = mysqli_query($con,"SELECT`data_siswa`.*,`jurusan`.singkatan FROM `data_siswa` JOIN `jurusan` ON `data_siswa`.id_jurusan=`jurusan`.id_jurusan
              WHERE CONCAT(`nis`,`nama_siswa`)LIKE'%$s%'") or die(mysqli_error());
              echo "<div class='wrapper'><center> Nama atau NIS tidak ditemukan!</center></div>
                    <style>table,.btn-custom,.select-custom-sidak, label {display:none;}</style>";
            }else{
              $sqll = mysqli_query($con,"SELECT`data_siswa`.*,`jurusan`.singkatan FROM `data_siswa` JOIN `jurusan` ON `data_siswa`.id_jurusan=`jurusan`.id_jurusan
              WHERE CONCAT(`nis`,`nama_siswa`)LIKE'%$s%'") or die(mysqli_error());
            }

            while($tampil = mysqli_fetch_array($sqll)){

              ?>
              <tr>
                  <input type="hidden" name="penyidak" value="<?php echo $data['nama']; ?>">
                  <td><?php echo $tampil['nis']; ?></td>
                  <td><?php echo $tampil['nama_siswa']; ?></td>
                  <td><?php echo $tampil['kelas']." ".$tampil['singkatan']." ".$tampil['indeks']; ?></td>
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
    <footer>
      <p>Copyright &copy; 2017 E-Sidak</p>
    </footer>
  </body>
</html>
<?php
}
?>
