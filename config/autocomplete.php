<?php
  include 'koneksi.php';

  $term = trim(strip_tags($_GET['term']));

  $result = mysqli_query($con, "SELECT * from data_siswa
                         where nama_siswa LIKE '".$term."%' OR nis LIKE '".$term."%'") or die(mysqli_error());
  $data = array();
  while ($row = mysqli_fetch_array($result))
   {
    $name = $row['nama_siswa'];
 		array_push($data, $name);

  }

  echo json_encode($data);
 ?>
