<?php
//memasukkan file config.php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>DATA MAHASISWA</title>
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
}
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
</head>

	
		<div class="btn">
			<h1 align="center">DAFTAR MAHASISWA AKTIF</h1>
				
						<button><a  href="index.php">Home</a></button>
				
						<button><a  href="tambah.php">Tambah</a></button>
	</div>
		<div class="table">
		<table align="center" border="1px" cellspacing="0px">
			
				<tr>
					<th>NO.</th>
					<th>NPM</th>
					<th>NAMA MAHASISWA</th>
					<th>JENIS KELAMIN</th>
					<th>JURUSAN</th>
					<th>AKSI</th>
				</tr>
		
			
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['nim'].'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['jenis_kelamin'].'</td>
							<td>'.$data['jurusan'].'</td>
							<td>
							<div class="btn">
								<button><a href="edit.php?id='.$data['id'].'" class="badge badge-warning">Edit</a></button>
								<button><a href="delete.php?id='.$data['id'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a></button>
							</div>
							</td>
						</tr>
						</div>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			</div>
		</table>
		</table>
	</div>
</body>
</html>