<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Rekapitulasi Absensi</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Rekap Absensi : <?php date_default_timezone_set('Asia/Jakarta'); $tanggal = date('Y-m-d'); echo $tanggal?></h3>
		
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: grey; color:white">
					<th style="width: 10px; text-align: center">No.</th>
					<th style="text-align: center">Nama</th>
					<th style="text-align: center">Kelas</th>
					<th style="text-align: center">Tingkat</th>
					<th style="text-align: center">Jurusan</th>
					<th style="text-align: center">Jenis Kelamin</th>
					<th style="text-align: center">Tanggal</th>
					<th style="text-align: center">Jam Masuk</th>
					<th style="text-align: center">Jam Pulang</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include "koneksi.php";

					//baca tabel absensi dan relasikan dengan tabel karyawan berdasarkan nomor kartu RFID untuk tanggal hari ini

					//baca tanggal saat ini
					date_default_timezone_set('Asia/Jakarta');
					$tanggal = date('Y-m-d');

					//filter absensi berdasarkan tanggal saat ini
					$sql = mysqli_query($konek, "select b.nama, b.tingkat, b.jenis_kelamin, b.kelas, b.jurusan, a.tanggal, a.jam_masuk, a.jam_pulang from absensi a, siswa b where a.nokartu=b.nokartu and a.tanggal='$tanggal'");

					$no = 0;
					while($data = mysqli_fetch_array($sql))
					{
						$no++;
				?>
				<tr>
					<td> <?php echo $no; ?> </td>
					<td style="text-align: center"> <?php echo $data['nama']; ?> </td>
					<td style="text-align: center"> <?php echo $data['kelas']; ?> </td>
					<td style="text-align: center"> <?php echo $data['tingkat']; ?> </td>
					<td style="text-align: center"> <?php echo $data['jurusan']; ?> </td>
					<td style="text-align: center"> <?php echo $data['jenis_kelamin']; ?> </td>
					<td style="text-align: center"> <?php echo $data['tanggal']; ?> </td>
					<td style="text-align: center"> <?php echo $data['jam_masuk']; ?> </td>
					<td style="text-align: center"> <?php echo $data['jam_pulang']; ?> </td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>