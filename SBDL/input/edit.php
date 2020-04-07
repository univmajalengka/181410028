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
			background-size: cover;
			background-position:center center;
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
			
			

			<div class="btn">
			<h1 align="center">DAFTAR MAHASISWA AKTIF</h1>
				
						<button><a class="nav-link" href="index.php">Home</a></button>
				
						<button><a class="nav-link" href="tambah.php">Tambah</a></button>
	</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>EDIT MAHASISWA</h2>
		
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama			= $_POST['nama'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$jurusan		= $_POST['jurusan'];
			
			$sql = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan' WHERE id='$id'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?id='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"><b>NIM</b></label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" size="10" value="<?php echo $data['nim']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="LAKI-LAKI" <?php if($data['jenis_kelamin'] == 'LAKI-LAKI'){ echo 'checked'; } ?> required>
						<label class="form-check-label">LAKI-LAKI</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" <?php if($data['jenis_kelamin'] == 'PEREMPUAN'){ echo 'checked'; } ?> required>
						<label class="form-check-label">PEREMPUAN</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JURUSAN</label>
				<div class="col-sm-10">
					<select name="jurusan" class="form-control" required>
						<option value="">- PILIH JURUSAN -</option>
						<option value="TEKNIK INFORMATIKA" <?php if($data['jurusan'] == 'TEKNIK INFORMATIKA'){ echo 'selected'; } ?>>- TEKNIK INFORMATIKA -</option>
						<option value="TEKNIK SIPIL" <?php if($data['jurusan'] == 'TEKNIK SIPIL'){ echo 'selected'; } ?>>- TEKNIK SIPIL -</option>
						<option value="TEKNIK INDUSTRI" <?php if($data['jurusan'] == 'TEKNIK INDUSTRI'){ echo 'selected'; } ?>>- TEKNIK INDUSTRI -</option>
						<option value="TEKNIK MESIN" <?php if($data['jurusan'] == 'TEKNIK MESIN'){ echo 'selected'; } ?>>- TEKNIK MESIN -</option>
						<option value="TEKNIK KOMPUTER" <?php if($data['jurusan'] == 'TEKNIK KOMPUTER'){ echo 'selected'; } ?>>- TEKNIK KOMPUTER -</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
</body>
</html>