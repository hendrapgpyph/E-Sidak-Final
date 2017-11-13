<?php
  include 'koneksi.php';

  $term = trim(strip_tags($_GET['term']));

  $result = mysqli_query($con, "SELECT * from data_siswa
                         where nis LIKE '".$term."%'") or die(mysqli_error());
  $data = array();
  while ($row = mysqli_fetch_array($result))
   {
    $name = $row['nis'];
 		array_push($data, $name);

  }

  echo json_encode($data);
 ?>
