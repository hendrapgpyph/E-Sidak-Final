<?php
  @session_start();
  include 'koneksi.php';

  $username = $_POST['username'];
  $pass = ($_POST['pass']);

  $query = mysqli_query($con,"select * from user where username='$username' and pass='$pass'");
  $data = mysqli_fetch_array($query);
  $cek = mysqli_num_rows($query);

  if($cek >= 1 ){
      if($data['level'] == "admin"){
        $_SESSION['admin'] = $username;
        header("location:../admin/admin_home.php");

      }else if($data['level'] == "guru"){
        $_SESSION['guru'] = $username;
        header("location:../user/guru_home.php");

      }else{
      $_SESSION['osis'] = $username;
        header("location:../user/osis_home.php");

    }
  }else{
    header('location:../form_login.php?notif=true');

  }
?>
