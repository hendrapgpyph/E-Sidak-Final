<?php
include 'koneksi.php';
$date = date('d-m-Y');
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("content-disposition: attachment;filename=Daftar-Data-Siswa-$date.xls");

 ?>
<table border="1">
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
            </tr>
            </thead>
            <tbody>
              <?php
            include "../config/koneksi.php";

            $sqll = mysqli_query($con,"select * from data_siswa") or die (mysqli_error());
            while($tampil = mysqli_fetch_array($sqll)){
              ?>

              <tr>
                <td><?php echo $tampil['nis']; ?></td>
                <td><?php echo $tampil['nama_siswa']; ?></td>
                <td><?php echo $tampil['kelas']; ?></td>
                <td><?php echo $tampil['id_jurusan']; ?></td>
                <td><?php echo $tampil['indeks']; ?></td>
                <td><?php echo $tampil['nama_ortu']; ?></td>
                <td><?php echo $tampil['no_ortu']; ?></td>
                <td><?php echo $tampil['alamat']; ?></td>
                <td><?php echo $tampil['poin']; ?></td>
              </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>