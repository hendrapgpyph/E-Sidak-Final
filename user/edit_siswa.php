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
          <h2 class="text-center">EDIT SISWA</h2>
      </div>
    </div>


    <div class="container-fluid">
          <div class="col-md-12">

            <div class="container-panel-detail form-content">
              <?php
                include "../config/koneksi.php";
                $nis = $_GET['nis'];
                $ambilkelas = $_GET['kelas'];
                $ambiljurusan = $_GET['jurusan'];
                $ambilindeks = $_GET['indeks'];
              ?>
              <table class="table table-custom">
              <form action="edit_proses.php?kelas=<?php echo$ambilkelas;?>&jurusan=<?php echo $ambiljurusan;?>&indeks=<?php echo $ambilindeks;?>" method="post">
                <?php
                $sql = mysqli_query($con,"SELECT * FROM data_siswa where nis='$nis'");
                while($row=mysqli_fetch_array($sql)){
              ?>

              <tbody>
                <tr>
                  <th>NIS</th>
                  <td>: <input type="text" name="nis" class="form-control form-control-custom" value="<?php echo $row['nis'];?>" required></td>
                </tr>

                <tr>
                  <th>Nama</th>
                  <td>: <input type="text" name="nama_siswa" class="form-control form-control-custom" value="<?php echo $row['nama_siswa'];?>" required></td>
                </tr>

                <tr>
                  <th>Kelas</th>
                  <td>:
                        <select name="kelas" class="form-control custom-inline-form" required>
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
                  </td>
                </tr>

                <tr>
                  <th>Jurusan</th>
                  <td>:
                    <select name="id_jurusan" class="form-control custom-inline-form" required>

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
                  </td>
                </tr>

                <tr>
                  <th>Indeks</th>
                  <td>:
                    <?php
                  $indeks = $row['indeks'];
                  if($indeks==1){
                    echo "<label class='radio-inline'><input type='radio' name='indeks' value='1' checked>1</lable>
                          <label class='radio-inline'><input type='radio' name='indeks' value='2'>2</lable>
                          <label class='radio-inline'><input type='radio' name='indeks' value='3'>3</lable>";
                  }else if ($indeks==2) {
                    echo "<label class='radio-inline'><input type='radio' name='indeks' value='1'>1</lable>
                          <label class='radio-inline'><input type='radio' name='indeks' value='2' checked>2</lable>
                          <label class='radio-inline'><input type='radio' name='indeks' value='3'>3</lable>";
                  }else{
                    echo "<label class='radio-inline'><input type='radio' name='indeks' value='1'>1</lable>
                          <label class='radio-inline'><input type='radio' name='indeks' value='2'>2</lable>
                          <label class='radio-inline'><input type='radio' name='indeks' value='3' checked>3</lable>";
                  }
                ?>
                  </td>
                </tr>

                <tr>
                  <th>Poin</th>
                  <td>: <input type="number" name="poin" class="form-control form-control-custom" value="<?php echo $row['poin'];?>" min="1" max="100" required></td>
                </tr>

                <tr>
                  <td><hr></td>
                </tr>

                <tr>
                  <th>Nama Orang Tua</th>
                  <td>: <input type="text" name="nama_ortu" class="form-control form-control-custom" value="<?php echo $row['nama_ortu'];?>" required></td>
                </tr>

                <tr>
                  <th>No.Hp</th>
                  <td>: <input type="text" name="no_ortu" class="form-control form-control-custom" value="<?php echo $row['no_ortu'];?>" required></td>
                </tr>

                <tr>
                  <th>Alamat</th>
                  <td>: <input type="text" name="alamat" class="form-control form-control-custom" value="<?php echo $row['alamat'];?>" required></td>
                </tr>

              </tbody>

              </table>
            </div>
      </div>
    </div>
    <div class="container-fluid container-button-update">

        <div class="col-md-12 ">
          <button class="btn btn-cetak" type="button"><i class="fa fa-print"></i>
            <a href="../config/laporan.php?nis=<?php echo $row['nis'];?>&jurusan=<?php echo $row['id_jurusan'];?>">Cetak Laporan</a></button>
          <button class="btn btn-update" type="submit">Update</button>
        </div>
        <?php
          }
        ?>
    </div>
      </form>
      <a class="btn-back-r" href="sistem_info_siswa.php?kelas=<?php echo$ambilkelas;?>&jurusan=<?php echo $ambiljurusan;?>&indeks=<?php echo $ambilindeks;?>"><i class="fa fa-arrow-left"></i></a>

    <footer>
      <p>Copyright &copy; 2017 E-Sidak</p>
    </footer>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
?>
