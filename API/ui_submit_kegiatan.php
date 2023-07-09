<?php
$user_name = "root";
$password = "";
$server = "localhost";
$db_name = "sibcad";

$con = mysqli_connect($server, $user_name, $password, $db_name);
?>

<html>
	<head>
		<title>Testing insert kegiatan</title>
	</head>
	<body>
		<form action="submit_kegiatan_provinsi.php" method="POST">
			<a>ID Calon</a>
			<input type="text" name="id_calon" placeholder="Fill name">
			<br>
			<a>Nama kegiatan</a>
			<input type="text" name="nama" placeholder="Fill name">
			<br>
			<a>ID Kabkota</a>
			<input type="text" name="id_kabkota" placeholder="Fill name">
			<br>
			<a>ID Kec</a>
			<input type="text" name="id_kec" placeholder="Fill name">
			<br>
			<a>ID Keldesa</a>
			<input type="text" name="id_keldesa" placeholder="Fill name">
			<br>
			<a>Jumlah Peserta</a>
			<input type="number" name="jumlah_peserta" placeholder="Fill name">
			<br>
			<a>Tanggal</a>
			<input type="text" name="tanggal" placeholder="Fill name">
			<br>
			<a>Jenis kegiatan</a>
			<input type="text" name="jenis" placeholder="Fill name">
			<br>
			<a>Latitude</a>
			<input type="text" name="lat" placeholder="Fill name">
			<br>
			<a>Longitude</a>
			<input type="text" name="lng" placeholder="Fill name">
			<br>
			<a>Foto</a>
			<input type="text" name="foto" placeholder="Fill name">
			<br>
			<a>Ket (opsional)</a>
			<input type="text" name="keterangan" placeholder="Fill name">
			<br>

			<input type="submit">
		</form>
	</body>
</html>