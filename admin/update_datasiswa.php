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
           <h2 class="text-center">UPDATE DATA SISWA</h2>
       </div>
     </div>

 <?php
  include ("../config/koneksi.php");
  $id=$_GET['id'];
  $query=mysqli_query($con,"SELECT * FROM data_siswa where nis='$id'");
  while($row=mysqli_fetch_array($query)){
  ?>

<!--Welcome-->
    <div class="container-fluid">
      <div class="col-md-12">
        <div class="form-content tambah">
          <form action="../config/update_datasiswa.php?id=<?php echo $row['nis'];?>" method="post">

              <div class="form-group">
                <label>NIS</label>
                <input type="number" class="form-control" name="nis" value="<?php echo $row['nis'];?>"  min="9999" max="99999"  required>
              </div>

              <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" class="form-control" name="nama_siswa" value="<?php echo $row['nama_siswa'];?>" required>
              </div>

              <div class="form-group">
                <label for="selk">Kelas</label>
                <select class="form-control" name="kelas" id="selk">
                  <?php
                  $kelas = $row['kelas'];
                  if ($kelas == 10 ){
                    echo "<option value='10'>X</option>";
                    echo "<option value='11'>XI</option>";
                    echo "<option value='12'>XII</option>";
                  }elseif ($kelas == 11) {
                    echo "<option value='11'>XI</option>";
                    echo "<option value='10'>X</option>";
                    echo "<option value='12'>XII</option>";
                  }else{
                    echo "<option value='12'>XII</option>";
                    echo "<option value='10'>X</option>";
                    echo "<option value='11'>XI</option>";
                  }

                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="selj">Jurusan</label>
                <br>
                <select class="form-control" id="selj" name="id_jurusan" required>

                        <?php
                          $jurusann = $row['id_jurusan'];
                          $queryy=mysqli_query($con,"SELECT * FROM jurusan where id_jurusan='$jurusann'");
                          while($roww=mysqli_fetch_array($queryy)){
                        ?>
                        <option value="<?php echo $roww['id_jurusan']?>"><?php echo $roww['nama_jurusan']?></option>
                        <?php
                        }
                        $queri=mysqli_query($con,"SELECT * FROM jurusan where id_jurusan!='$jurusann'");
                        while($rows=mysqli_fetch_array($queri)){
                        ?>
                        <option value="<?php echo $rows['id_jurusan']?>"><?php echo $rows['nama_jurusan']?></option>
                        <?php }
                      ?>

              </select>
              </div>

              <div class="form-group">
                <label>Indeks</label><br>
                <?php
                  $indeks = $row['indeks'];
                  if($indeks==1){
                    echo "<label class='radio-inline'><input type='radio' name='indeks' value='1' checked>1</label>
                          <label class='radio-inline'><input type='radio' name='indeks' value='2'>2</label>
                          <label class='radio-inline'><input type='radio' name='indeks' value='3'>3</label>";
                  }else if ($indeks==2) {
                    echo "<label class='radio-inline'><input type='radio' name='indeks' value='1'>1</label>
                          <label class='radio-inline'><input type='radio' name='indeks' value='2' checked>2</label>
                          <label class='radio-inline'><input type='radio' name='indeks' value='3'>3</label>";
                  }else{
                    echo "<label class='radio-inline'><input type='radio' name='indeks' value='1'>1</label>
                          <label class='radio-inline'><input type='radio' name='indeks' value='2'>2</label>
                          <label class='radio-inline'><input type='radio' name='indeks' value='3' checked>3</label>";
                  }

                ?>
              </div>

              <div class="form-group">
                <label>Nama Orang Tua</label>
                <input type="text" class="form-control" name="nama_ortu" value="<?php echo $row['nama_ortu'];?>" required>
              </div>

              <div class="form-group">
                <label>No Telepon Orang Tua</label>
                <input type="number" class="form-control" name="no_ortu" value="<?php echo $row['no_ortu'];?>" required>
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat'];?>" required>
              </div>

              <div class="form-group">
                <label>Poin</label>
                <input type="number" class="form-control" name="poin" value="<?php echo $row['poin'];?>" min="1" max="100" required>
              </div>

              <button type="submit" class="btn">Update</button>
          </form>
        </div>
        <a href="datasiswa_admin.php" class="btn-back"><i class="fa fa-arrow-left"></i></a>
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
<?php
}
?>
