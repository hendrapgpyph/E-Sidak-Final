<?php
include 'koneksi.php';
$date = date('d-m-Y');
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("content-disposition: attachment;filename=Daftar-Pelanggaran-$date.xls");

 ?>
<table border="1">
            <tr>
                <th>Id Pelanggaran</th><th>Nama Pelanggaran</th><th>Min Poin</th>
            </tr>
            <tbody>
              <?php
                include "../config/koneksi.php";

                $sqll = mysqli_query($con,"select * from pelanggaran") or die (mysqli_error());
                while($tampil = mysqli_fetch_array($sqll)){
              ?>

              <tr>
                <td><?php echo $tampil['id_pelanggaran']; ?></td>
                <td><?php echo $tampil['nama_pelanggaran']; ?></td>
                <td><?php echo $tampil['min_poin']; ?></td>
              </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>