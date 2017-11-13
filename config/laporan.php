<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Print Laporan</title>

    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }

    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }

    .invoice-box table td{
        padding:1px;
        vertical-align:top;
    }

	.invoice-box table tr td:nth-child(2){
        text-align:left;
	}

    .invoice-box table tr td:nth-child(3){
        text-align:left;
    }

    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }

    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }

    .invoice-box table tr.information table td{
        padding-bottom:10px;
    }

    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }

    .invoice-box table tr.details td{
        padding-bottom:20px;
    }


    .invoice-box table tr.item.last td{
        border-bottom:none;
    }

    .invoice-box table tr.total td:nth-child(3){
        border-top:2px solid #eee;
        font-weight:bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }

        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
<?php
	include 'koneksi.php';
  include 'fungsi_tglindonesia.php';
  $nis = $_GET['nis'];
  $id_jurusan = $_GET['jurusan'];
  $query = mysqli_query($con,"SELECT`data_siswa`.*,`jurusan`.nama_jurusan FROM `data_siswa` JOIN `jurusan` ON `data_siswa`.id_jurusan=`jurusan`.id_jurusan
      WHERE nis = '$nis'") or die(mysqli_error());
?>
<?php
	$no = 1;
	while($data = mysqli_fetch_array($query))
		{
?>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="../img/laporan.png" style="width:100%; max-width:1000px;">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


            <tr class="item">
                <td>
                    No : 421.5/484/SMKN-01.DPS/2017
                </td>

                <td>

                </td>
				<td>
                   Kepada Yth.
                </td>
            </tr>

            <tr class="item">
                <td>
                    Lampiran : -
                </td>

				<td>

                </td>

                <td>
                   Bapak/Ibu Wali murid dari <br> <?php echo $data['nama_siswa'];?>
                </td>
            </tr>

            <tr class="item">
                <td>
                    Hal : <u><b>SURAT PANGGILAN</u></b>
                </td>

				<td>

                </td>

                <td>
                  Kelas :<?php echo "<br>".$data['kelas']." ".$data['nama_jurusan']." ".$data['indeks'];?>
                </td>
            </tr>
			<tr class="item">
                <td>
				     .
                </td>

				<td>

                </td>

                <td>
                    .
                </td>
            </tr>
            <tr class="item">
                <td>
                    Dengan Hormat,
                </td>

				<td>

                </td>

                <td>
                </td>
            </tr>

            <tr class="item">
                <td>
                    Sehubungan dengan permasalahan yang harus di selesaikan bersama,maka
                </td>

				<td>

                </td>

                <td>

                </td>
            </tr>

            <tr class="item ">
                <td>
                   dengan ini kami mengharapkan kehadiran Bapak/Ibu Wali Murid pada :
                </td>

				<td>

				</td>

                <td>

                </td>
            </tr>

            <tr class="item">
                <td>
				.
				</td>

				<td>

				</td>

                <td>
                   .
                </td>
            </tr>
			            <tr class="item">
                <td>
				Hari / Tanggal :
				</td>

				<td>

				</td>

                <td>

                </td>
            </tr>
			            <tr class="item">
                <td>
				Waktu :
				</td>

				<td>

				</td>

                <td>

                </td>
            </tr>
			            <tr class="item">
                <td>
				Tempat : SMK NEGERI 1 DENPASAR
				</td>

				<td>

				</td>

                <td>
                   .
                </td>
            </tr>
			<tr class="item">
                <td>
				.
				</td>

				<td>

				</td>

                <td>
                   .
                </td>
            </tr>
			<tr class="item">
                <td>
				Demikian surat panggilan ini kami sampaikan, atas perhatian Bapak/Ibu
				</td>

				<td>

				</td>

                <td>
                   .
                </td>
            </tr>
			<tr class="item">
                <td>
				kami ucapkan Terimakasih
				</td>

				<td>

				</td>

                <td>
                   .
                </td>
            </tr>
						<tr class="item">
                <td>
				.
				</td>

				<td>

				</td>

                <td>
                   .
                </td>
            </tr>
						<tr class="item">
                <td>
				.
				</td>

				<td>

				</td>

                <td>
                  <?php
                    $tgl = date('Y-m-d');
                    $tgl_indo = tgl_indonesia($tgl);
                    ?>
                  Denpasar, <?php echo $tgl_indo; ?>
                </td>
            </tr>			<tr class="item">
                <td>
				.
				</td>

				<td>

				</td>

                <td>
                   .
                </td>
            </tr>
						<tr class="item">
                <td>
				.
				</td>

				<td>

				</td>

                <td>

                </td>
            </tr>
						<tr class="item">
                <td>
				.
				</td>

				<td>

				</td>

                <td>
                   .
                </td>
            </tr>
						<tr class="item">
                <td>
				.
				</td>

				<td>

				</td>

                <td>
                   ________________________
                </td>
            </tr>
						<tr class="item">
                <td>
				.
				</td>

				<td>

				</td>

                <td>
                   NIP. _____________________
                </td>
            </tr>
        </table>
    </div>
	<br>
	<br>
  <script>
window.print() ;
setTimeout(window.close, 0);
</script>
</body>
<?php } ?>
</html>
