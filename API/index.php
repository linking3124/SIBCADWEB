<?php
$user_name = "root";
$password = "";
$server = "localhost";
$db_name = "sibcad";

$con = mysqli_connect($server, $user_name, $password, $db_name);
?>

<html>
	<head>
		<title>Testing insert suara</title>
	</head>
	<body>
		<form action="submit_suara.php" method="POST">
			<a>ID TPS</a>
			<input type="text" name="id_tps" placeholder="Fill name">
			<br>
			<a>ID User</a>
			<input type="text" name="NIK" placeholder="Fill name">
			<br>
			<a>Jumlah Suara Paslon #1</a>
			<input type="text" name="jlhsuara_paslon1" placeholder="Fill name">
			<br>
			<a>Jumlah Suara Paslon #2</a>
			<input type="text" name="jlhsuara_paslon2" placeholder="Fill name">
			<br>
			<a>Jumlah Suara Paslon #3</a>
			<input type="text" name="jlhsuara_paslon3" placeholder="Fill name">
			<br>
			<a>Jumlah Suara Paslon #4</a>
			<input type="text" name="jlhsuara_paslon4" placeholder="Fill name">
			<br>
			<a>Waktu</a>
			<input type="text" name="waktu" placeholder="Fill name">
			<br>
			<a>Foto</a>
			<input type="text" name="foto" placeholder="Fill name">
			<br>

			<input type="submit">
		</form>
	</body>
</html>