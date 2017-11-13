<?php
include 'koneksi.php';
$date = date('d-m-Y');
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("content-disposition: attachment;filename=Daftar-User-$date.doc");

 ?>

<table border="1">
            <tr>
                <th>Id User</th><th>Nama</th><th>Username</th><th>Password</th><th>Level</th>
            </tr>
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

              </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>
