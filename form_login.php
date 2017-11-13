<!DOCTYPE html>
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shorcut icon" href="img/esidak2.png">

  <!-- script -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="header-form">
        <img src="img/esidak2.png" alt="">

      </div>
    </div>

    <div class="container-fluid">
      <div class="col-md-12">
        <div class="form-content login">
           <div class="label">
               <h3>Sign In</h3>
           </div>
          <form action="config/login.php" method="post">
              <?php
                $notif = isset($_GET['notif']) ? $_GET['notif']:false;

                if($notif == "true") {
                  echo "<div class='notif'>Username dan Password salah !</div>";
                  echo "<style>
                  .form-content .form-group i.fa-user {
                      position: absolute;
                      top: 125px;
                      right: 40px;
                  }
                  </style>";
                }
                ?>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" autofocus required ><i class="fa fa-user"></i>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control password" name="pass" required><label id="showHide"><i id="icon" class="fa fa-eye"></i></label>
              </div>
              <button type="submit" class="btn">Sign In</button>

          </form>

        </div>
      </div>
    </div>

  </body>
</html>
