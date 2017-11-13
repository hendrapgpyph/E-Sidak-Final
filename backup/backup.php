<?php
				
					include("koneksi.php");
					
					$username	= $_POST['username'];
					$pass	= md5($_POST['pass']);
					$level		= $_POST['level'];
					
					$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND pass='$pass'");
					if(mysqli_num_rows($query) == 0){
						echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
					}else{
						$row = mysqli_fetch_assoc($query);
						
						if($row['level'] == 1 && $level == 1){
							$_SESSION['username']=$username;
							$_SESSION['level']='admin';
							header("Location:index1.php");
						}else if($row['level'] == 2 && $level == 2){
							$_SESSION['username']=$username;
							$_SESSION['level']='guru';
							header("Location:index2.php");
						}else if($row['level'] == 3 && $level == 3){
							$_SESSION['username']=$username;
							$_SESSION['level']='osis';
							header("Location:index3.php");
						}else{
							echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
						}
					}

				?>


			<div class="form-group">
                <label>Level</label>
                <br>
                <select name="level">
                  <?php
                          if ($row['level']=='guru') {
                            echo "<option value='guru'>Guru</option>
                                  <option value='osis'>Osis</option>";
                          }else{
                            echo "<option value='osis'>Osis</option>
                            <option value='guru'>Guru</option>";
                          }
                        ?>
                </select>
            </div>


$level = $_POST['level'];

,level='$level'

<div class="container fonta">

            <table class="table">
            <tr>
                <th>Nama Siswa</th><th>Nama Kelas</th><th>Point</th><th>Action</th>
            </tr>
            <tbody>
              <?php
            include "../config/koneksi.php";

            $sqll = mysqli_query($con,"select * from data_siswa, kelas where poin=10") or die (mysqli_error());
            while($tampil = mysqli_fetch_array($sqll)){
              ?>

              <tr>
                <td><?php echo $tampil['nama_siswa']; ?></td>
                <td><?php echo $tampil['nama_kls']; ?></td>
                <td><?php echo $tampil['poin']; ?></td>
                <td>
                    <a href="../config/delete_datasiswa.php?id=<?php echo $tampil['id'];?>">
                        <button class="btn btn-warning" type="button">
                            <i class="fa fa-remove" aria-hidden="true"></i>
                        </button>
                    </a>
                </td>
              </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>
        </div>


<div class="container fonta">

            <table class="table">
            <tr>
                <th>Id Riwayat</th><th>Id User</th><th>NIS</th><th>Id Langgar</th><th>Status</th>
            </tr>
            <tbody>
              <?php 
            include "../config/koneksi.php";
            
            $sqll = mysqli_query($con,"select * from riwayat") or die(mysqli_error());
            while($tampil = mysqli_fetch_array($sqll)){
              ?>

              <tr>
                <td><?php echo $tampil['id']; ?></td>
                <td><?php echo $tampil['id_user']; ?></td>
                <td><?php echo $tampil['nis']; ?></td>
                <td><?php echo $tampil['id_langgar']; ?></td>
                <td><?php echo $tampil['status']; ?></td>
              </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>
        </div>