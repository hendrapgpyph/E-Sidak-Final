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
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="shorcut icon" href="../img/esidak2.png">

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
          <h2 class="text-center">USER</h2>
      </div>
    </div>

<!--Welcome-->
        <div class="container" style="margin-top:2%; margin-bottom:3%;">
        <div class="input-group" style="width:40%; margin-left:30%;">

        </div>
        </div>

        <div class="container container-button-cetak">
          <div class="col-md-12">
            <div class="btn-group">
            <button type="button" name="button" class="btn btn-cw">
              <a href="../config/word_user.php"><i class="fa fa-file-word-o"></i>&nbsp;Cetak Word</a>
            </button>
            <button type="button" name="button" class="btn btn-ce">
            <a href="../config/excel_user.php"><i class="fa fa-file-excel-o"></i>&nbsp;Cetak Excel</a>
          </button>
          </div>
          <a href="form_register.php">
              <button class="btn btn-warning btn-tambah" type="button">
                  <i class="fa fa-plus" aria-hidden="true"></i>
              </button>
           </a>
          </div>
        </div>

        <div class="wrapper">
        <div class="container">
            <table class="table table-striped database">
              <thead>
                <tr>
                  <th>Id User</th><th>Nama</th><th>Username</th><th>Password</th><th>Level</th><th>Action</th>
                </tr>
              </thead>
            <tbody>
              <?php
                  include '../config/koneksi.php';
                  $selainadmin = ('admin');
                  $tampil3 = $con->query("select * from user where level !='$selainadmin'");
                  while($row=mysqli_fetch_array($tampil3)){
              ?>

              <tr>
                <td><?php echo $row['id_user']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['pass']; ?></td>
                <td><?php echo $row['level']; ?></td>
                <td>
                    <a href="update_user.php?id=<?php echo $row['id_user'];?>">
                        <button class="btn btn-warning" type="button">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                     </a>
                    <a href="../config/delete_user.php?id=<?php echo $row['id_user'];?>">
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
