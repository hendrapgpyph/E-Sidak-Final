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
          <h2 class="text-center">DATA SISWA</h2>
      </div>
    </div>

<form function="datasiswa_admin.php" method="post">
    <div class="container-fluid">
      <div class="box frame-cari2">
        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="cari">Jurusan</label>
            <select class="form-control select-custom-cari" id="pilih" name="jurusan">
              <option value="0">Pilih...</option>
              <?php
              include "../config/koneksi.php";
              $sqll = mysqli_query($con,"SELECT * FROM jurusan")or die(mysqli_error());
              while($tampil = mysqli_fetch_array($sqll)){
              ?>
              <option value="<?php echo $tampil['singkatan']?>"><?php echo $tampil['nama_jurusan']?></option>
              <?php
            }
              ?>
            </select>
          </div>
        </div>

        <div class="col-md-8">
          <div class="input-container">
            <input type="text" id="siswa" class="form-control select" name="nama" placeholder="Cari Nama / NIS...">
            
              <button class="btn btn-warning" type="submit" name="cari">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            
            </div>
          </div>
</form>
        </div> <!--ROW-->

      </div> <!--BOX-->
    </div> <!--container-fluid-->
  </div>

  <div class="container container-button-cetak">
    <div class="col-md-12">
      <div class="btn-group">
      <button type="button" name="button" class="btn btn-cw">
        <a href="../config/word_datasiswa.php"><i class="fa fa-file-word-o"></i>&nbsp;Cetak Word</a>
      </button>
      <button type="button" name="button" class="btn btn-ce">
      <a href="../config/excel_datasiswa.php"><i class="fa fa-file-excel-o"></i>&nbsp;Cetak Excel</a>
    </button>
    <button type="button" name="button" class="btn btn-nk">
      <a href="../config/naik_kelas.php"
      onclick="return confirm('Program akan mengubah kelas 10 menjadi kelas 11, kelas 11 menjadi kelas 12, menghapus semua data dari kelas 12 yang lalu serta mereset poin. Apakah anda yakin?')">
      <i class="fa fa-arrow-circle-up"></i>&nbsp;Naik Kelas</a>
    </button>
    </div>
    <a href="form_datasiswa.php">
        <button class="btn btn-warning btn-tambah" type="button">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
     </a>
    </div>
  </div>
      <div class="wrapper">
        <div class="container fluid">
            <table class="table table-striped database">
            <thead>
            <tr>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Indeks</th>
                <th>Nama Orang Tua</th>
                <th>No Orang Tua</th>
                <th>Alamat</th>
                <th>Point</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
              <?php
            include "../config/koneksi.php";
            if (isset($_POST['cari']) and !($_POST['nama'])) {

            if (!($_POST['jurusan'])) {
              $sqll = mysqli_query($con,"select data_siswa.*, jurusan.singkatan from data_siswa join jurusan on data_siswa.id_jurusan=jurusan.id_jurusan") or die (mysqli_error());
            }else{
              $jurusan = $_POST['jurusan'];
            $sqll = mysqli_query($con,"select data_siswa.*, jurusan.singkatan from data_siswa join jurusan on data_siswa.id_jurusan=jurusan.id_jurusan where singkatan='$jurusan'") or die (mysqli_error());
            }
          }elseif(isset($_POST['cari']) and ($_POST['nama'])){
            $nama = $_POST['nama'];
            $cek  = mysqli_num_rows(mysqli_query($con,"SELECT `data_siswa`.*, `jurusan`.singkatan from `data_siswa` join `jurusan` on `data_siswa`.id_jurusan=`jurusan`.id_jurusan WHERE CONCAT(`nis`,`nama_siswa`)LIKE'%$nama%'"));
            if ($cek==0) {
              $sqll = mysqli_query($con,"SELECT `data_siswa`.*, `jurusan`.singkatan from `data_siswa` join `jurusan` on `data_siswa`.id_jurusan=`jurusan`.id_jurusan WHERE CONCAT(`nis`,`nama_siswa`)LIKE'%$nama%'") or die (mysqli_error());
              echo "<center>NAMA ATAU NIS TIDAK DITEMUKAN!</center>";
            }else{
            $sqll = mysqli_query($con,"SELECT `data_siswa`.*, `jurusan`.singkatan from `data_siswa` join `jurusan` on `data_siswa`.id_jurusan=`jurusan`.id_jurusan WHERE CONCAT(`nis`,`nama_siswa`)LIKE'%$nama%'") or die (mysqli_error());
          }
        }else{
            $sqll = mysqli_query($con,"select data_siswa.*, jurusan.singkatan from data_siswa join jurusan on data_siswa.id_jurusan=jurusan.id_jurusan") or die (mysqli_error());
          }
            while($tampil = mysqli_fetch_array($sqll)){
              ?>

              <tr>
                <td><?php echo $tampil['nis']; ?></td>
                <td><?php echo $tampil['nama_siswa']; ?></td>
                <td><?php echo $tampil['kelas']; ?></td>
                <td><?php echo $tampil['singkatan']; ?></td>
                <td><?php echo $tampil['indeks']; ?></td>
                <td><?php echo $tampil['nama_ortu']; ?></td>
                <td><?php echo $tampil['no_ortu']; ?></td>
                <td><?php echo $tampil['alamat']; ?></td>
                <td><?php echo $tampil['poin']; ?></td>
                <td>
                    <a href="update_datasiswa.php?id=<?php echo $tampil['nis'];?>">
                        <button class="btn btn-warning" type="button">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                     </a>
                    <a href="../config/delete_datasiswa.php?id=<?php echo $tampil['nis'];?>">
                        <button class="btn btn-warning" type="button">
                            <i class="fa fa-remove" aria-hidden="true"></i>
                        </button>
                    </a>
                </td>
              </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>
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
