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

<script>
$(document).ready(function() {

  <?php
    $indeks = mysqli_query($con,"select * from jurusan") or die(mysql_error());
    while($tampill = mysqli_fetch_array($indeks)){
?>
  // Modal
  $('#openModal<?php echo $tampill['singkatan'];?>').click(function() {
    $('.<?php echo $tampill['singkatan'];?>').css("display", "block");
  })

  $('span.close').click(function() {
    $('.<?php echo $tampill['singkatan'];?>').css("display", "none");
  })

  $(window).click(function(event) {
    var target = $(event.target);
    if (target.is('.<?php echo $tampill['singkatan'];?>')) {
      $('.<?php echo $tampill['singkatan'];?>').css("display", "none");
    }
  })

<?php
}
?>
  // Preloader
  $(window).on('load', function() { // makes sure the whole site is loaded
  $('#status').fadeOut(); // will first fade out the loading animation
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
  })

  $('#showHide').click(function() {
    if ($('.password').attr("type") == "password") {
      $('.password').attr("type", "text");
      $('#icon').removeClass('fa fa-eye');

      $('#icon').addClass('fa fa-eye-slash');
      $('#icon').css("color", "#2196f3");
    }
    else {
      $('.password').attr("type", "password");
      $('#icon').removeClass('fa fa-eye-slash');

      $('#icon').addClass('fa fa-eye');
      $('#icon').css("color", "black");
    }
  })
})
</script>
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

    <div class="container-fluid">
      <div class="box">
        <div class="row">
        <div class="col-md-12 col-sm-12">
          <label for=""><h3>Paket Keahlian :</h3></label>
          <?php
              $jurusan = mysqli_query($con,"select * from jurusan") or die(mysql_error());
              while($tampil = mysqli_fetch_array($jurusan)){
            ?>
          <ul class="list-group list-jurusan text-center">
            <li class="list-group-item"><a id="openModal<?php echo $tampil['singkatan'] ?>"><?php echo $tampil['nama_jurusan']; ?></a></li>
            <?php
              }
            ?>
          </ul>

          <?php
          $indeks = mysqli_query($con,"select * from jurusan") or die(mysql_error());
              while($tampill = mysqli_fetch_array($indeks)){
                if ($tampill['indeks_x']=='2') {
                  ?>

          <div id="myModal" class="modal <?php echo $tampill['singkatan'] ?>">
            <div class="modal-content">
              <div class="modal-header">
                <span class="close">&times;</span>
                <p><b><?php echo $tampill['nama_jurusan']; ?></b></p>
              </div>

              <div class="modal-body">
                <h4><li class="list-group-item text-center"><a href="sidak.php?kelas=10&indeks=1&id=<?php echo $tampill['id_jurusan']; ?>"><?php echo $tampill['nama_jurusan']; ?> 1</a></li></h4>
                <h4><li class="list-group-item text-center"><a href="sidak.php?kelas=10&indeks=2&id=<?php echo $tampill['id_jurusan']; ?>"><?php echo $tampill['nama_jurusan']; ?> 2</a></li></h4>
              </div>
            </div><!-- modal-content -->
          </div>
          <?php
                }else if ($tampill['indeks_x']=='3') {
          ?>
           <div id="myModal" class="modal <?php echo $tampill['singkatan'] ?>">
            <div class="modal-content">
              <div class="modal-header">
                <span class="close">&times;</span>
                <p><b><?php echo $tampill['nama_jurusan']; ?></b></p>
              </div>

              <div class="modal-body">
                <h4><li class="list-group-item text-center"><a href="sidak.php?kelas=10&indeks=1&id=<?php echo $tampill['id_jurusan']; ?>"><?php echo $tampill['nama_jurusan']; ?> 1</a></li></h4>
                <h4><li class="list-group-item text-center"><a href="sidak.php?kelas=10&indeks=2&id=<?php echo $tampill['id_jurusan']; ?>"><?php echo $tampill['nama_jurusan']; ?> 2</a></li></h4>
                <h4><li class="list-group-item text-center"><a href="sidak.php?kelas=10&indeks=3&id=<?php echo $tampill['id_jurusan']; ?>"><?php echo $tampill['nama_jurusan']; ?> 3</a></li></h4>
              </div>
            </div><!-- modal-content -->
          </div>
          <?php
                }else{
          ?>
<div id="myModal" class="modal <?php echo $tampill['singkatan'] ?>">
            <div class="modal-content">
              <div class="modal-header">
                <span class="close">&times;</span>
                <p><b><?php echo $tampill['nama_jurusan']; ?></b></p>
              </div>

              <div class="modal-body">
                <h4><li class="list-group-item text-center"><a href="sidak.php?kelas=10&indeks=1&id=<?php echo $tampill['id_jurusan']; ?>"><?php echo $tampill['nama_jurusan']; ?> 1</a></li></h4>
              </div>
            </div><!-- modal-content -->
          </div><!-- modal -->

          <?php
                }
              }
          ?>


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
