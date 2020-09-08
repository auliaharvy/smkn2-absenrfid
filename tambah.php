<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

	//jika tombol simpan diklik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$nokartu = $_POST['nokartu'];
		$nama    = $_POST['nama'];
		$tingkat = $_POST['tingkat'];
		$jurusan = $_POST['jurusan'];
		$kelas = $_POST['kelas'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$alamat  = $_POST['alamat'];

		//simpan ke tabel karyawan
		$simpan = mysqli_query($konek, "insert into siswa(nokartu, nama, tingkat, jurusan, kelas, jenis_kelamin, alamat)values('$nokartu', '$nama', '$tingkat', '$jurusan', '$jurusan', '$kelas', '$jenis_kelamin', '$alamat')");

		//jika berhasil tersimpan, tampilkan pesan Tersimpan,
		//kembali ke data karyawan
		if($simpan)
		{
			echo "
				<script>
					alert('Tersimpan');
					location.replace('datakaryawan.php');
				</script>
			";
		}
		else
		{
			echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('datakaryawan.php');
				</script>
			";
		}

	}

	//kosongkan tabel tmprfid
	mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Siswa</title>

	<!-- pembacaan no kartu otomatis -->
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#norfid").load('nokartu.php')
			}, 0);  //pembacaan file nokartu.php, tiap 1 detik = 1000
		});
	</script>

</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Tambah Data Siswa</h3>

		<!-- form input -->
		<form method="POST">
			<div id="norfid"></div>

			<div class="form-group">
				<label>Nama Siswa</label>
				<input type="text" name="nama" id="nama" placeholder="nama siswa" class="form-control" style="width: 400px">
			</div>
			<div class="form-group">
				<label>Tingkat</label>
				<select name="tingkat" id="tingkat" placeholder="tingkat" class="form-control" style="width: 400px">
					<option value="0"> pilih kelas </option>
					<option value="X"> X </option>
					<option value="XI"> XI </option>
					<option value="XII"> XII </option>
				</select>
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<input type="text" name="kelas" id="kelas" placeholder="kelas" class="form-control" style="width: 400px">
			</div>
			<div class="form-group">
				<label>Jurusan</label>
				<select name="jurusan" id="jurusan" placeholder="jurusan" class="form-control" style="width: 400px">
					<option value="0"> pilih Jurusan </option>
					<option value="AP"> AP (Administrasi Perkantoran) </option>
					<option value="AK"> AK (Akuntansi)</option>
					<option value="PM"> PM (Pemasaran)</option>
					<option value="MM"> MM (Multimedia)</option>
					<option value="TKJ"> TKJ (Teknik Komputer dan Jaringan)</option>
					<option value="AN"> AN (Animasi)</option>
				</select>
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jenis_kelamin" id="jenis_kelamin" placeholder="jenis kelamin" class="form-control" style="width: 400px">
					<option value="0"> pilih jenis kelamin </option>
					<option value="Pria"> Pria </option>
					<option value="Wanita"> Wanita </option>
				</select>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" placeholder="alamat" style="width: 400px"></textarea>
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>