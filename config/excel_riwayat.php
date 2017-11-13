<?php
include 'koneksi.php';
$date = date('d-m-Y');
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("content-disposition: attachment;filename=Daftar-Riwayat-$date.xls");

 ?>

 <table border="1">
     <thead>
       <tr>
           <th>No</th>
           <th>NIS</th>
           <th>Nama</th>
           <th>Tanggal</th>
           <th>Nama Sidak</th>
           <th>Penyidak</th>
       </tr>
     </thead>
     <tbody>
       <?php

         $sqll = mysqli_query($con,"select riwayat.*, data_siswa.nama_siswa, user.nama, pelanggaran.nama_pelanggaran from riwayat 
                            join data_siswa on riwayat.nis=data_siswa.nis  
                            join user on riwayat.id_user=user.id_user
                            join pelanggaran on riwayat.id_pelanggaran=pelanggaran.id_pelanggaran ORDER BY tanggal DESC") or die(mysqli_error());
         $no = 1;
         while ($row = mysqli_fetch_array($sqll)) {
           echo "<tr>";
             echo "<td>".$no."</td>";
             echo "<td>".$row['nis']."</td>";
             echo "<td>".$row['nama_siswa']."</td>";
             echo "<td>".$row['tanggal']."</td>";
             echo "<td>".$row['nama_pelanggaran']."</td>";
             echo "<td>".$row['nama']."</td>";
           echo "</tr>";
           $no++;
         }

        ?>
     </tbody>
 </table>
