<?php
include 'koneksi.php';
$date = date('d-m-Y');
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("content-disposition: attachment;filename=Daftar-Blacklist-$date.doc");

 ?>

 <table border="1">
     <thead>
       <tr>
           <th>No</th>
           <th>NIS</th>
           <th>Nama</th>
           <th>Kelas</th>
           <th>Poin</th>
       </tr>
     </thead>
     <tbody>
       <?php

        $sqll = mysqli_query($con,"select data_siswa.*, jurusan.singkatan from data_siswa join jurusan on data_siswa.id_jurusan=jurusan.id_jurusan where poin<=10") or die (mysqli_error());
         $no = 1;
         while ($row = mysqli_fetch_array($sqll)) {
           echo "<tr>";
             echo "<td>".$no."</td>";
             echo "<td>".$row['nis']."</td>";
             echo "<td>".$row['nama_siswa']."</td>";
             echo "<td>".$row['kelas']." ".$row['singkatan']." ".$row['indeks']."</td>";
             echo "<td>".$row['poin']."</td>";
           echo "</tr>";
           $no++;
         }

        ?>
     </tbody>
 </table>
