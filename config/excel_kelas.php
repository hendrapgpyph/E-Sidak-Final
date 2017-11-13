<?php
include 'koneksi.php';
$date = date('d-m-Y');
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("content-disposition: attachment;filename=Daftar-Jurusan-$date.xls");

 ?>
 <table border="1">
            <tr>
                <th>Id Jurusan</th><th>Nama Jurusan</th><th>Singkatan Jurusan</th><th>Jml Index Kls X</th><th>Jml Index Kls XI</th><th>Jml Index Kls XII</th>
            </tr>
            <tbody>
              <?php
            include "../config/koneksi.php";

            $sqll = mysqli_query($con,"select * from jurusan") or die (mysqli_error());
            while($tampil = mysqli_fetch_array($sqll)){
              ?>

              <tr>
                <td><?php echo $tampil['id_jurusan']; ?></td>
                <td><?php echo $tampil['nama_jurusan']; ?></td>
                <td><?php echo $tampil['singkatan']; ?></td>
                <td><?php echo $tampil['indeks_x']; ?></td>
                <td><?php echo $tampil['indeks_xi']; ?></td>
                <td><?php echo $tampil['indeks_xii']; ?></td>
              </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>