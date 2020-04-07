<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.body{
				background-image: url('images/bg.jpg');
				width: 100%;
				height: 1000px;
			background-repeat:no-repeat;
			background-position:center center;
			background-size: cover;
			}
		.nav {
			margin: auto;
			text-align: center;
			width: 100%;
			font-family: arial;
		}
		.btn {
	padding: 10px 24px;
	border: 2px;
	font-weight: 700;
	text-align: center;
	text-transform: uppercase;
	text-align: center;
	color: white;
}
.btn-primary{ 
background-color: white;
		a {
			color: black;
		}
		h1 {
			color: white;
		}
		h3 {
			color: white;
		}
	</style>
	<div class="body"><link rel="stylesheet" type="text/css" href="style.css">
	<title>DATA MAHASISWA</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="btn">
			<h1 align="center">DAFTAR MAHASISWA AKTIF</h1>
				
						<button><a class="nav-link" href="index.php">Home</a></button>
				
						<button><a class="nav-link" href="tambah.php">Tambah</a></button>
	</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>TAMBAH MAHASISWA</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$nim			= $_POST['nim'];
			$nama			= $_POST['nama'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$jurusan		= $_POST['jurusan'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO mahasiswa(nim, nama, jenis_kelamin, jurusan) VALUES('$nim', '$nama', '$jenis_kelamin', '$jurusan')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NPM</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="LAKI-LAKI" required>
						<label class="form-check-label">LAKI-LAKI</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" required>
						<label class="form-check-label">PEREMPUAN</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JURUSAN</label>
				<div class="col-sm-10">
					<select name="jurusan" class="form-control" required>
						<option value="">- PILIH JURUSAN -</option>
						<option value="TEKNIK INFORMATIKA">- TEKNIK INFORMATIKA -</option>
						<option value="TEKNIK SIPIL">- TEKNIK SIPIL -</option>
						<option value="TEKNIK INDUSTRI">- TEKNIK INDUSTRI -</option>
						<option value="TEKNIK MESIN">- TEKNIK MESIN -</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>
		</form>
	</div>
</body>
</html>