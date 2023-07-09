<?php
	/* login.php
     untuk pengecekkan akun login native ke server
    */
	include 'koneksi.php';
	
	if ($con)
	{

	class usr{}
	
	$username = $_POST["username"];
	$password = $_POST['password'];
	
	if ((empty($username)) || (empty($password))) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}

	$cek = "SELECT tb_calon.daerah FROM tb_calon WHERE username='$username' AND password='$password';";
	$result_cek = mysqli_query($con, $cek);
	
	$row_cek = mysqli_fetch_array($result_cek, MYSQLI_ASSOC);

	if ($row_cek['daerah'] != 0){
		$query = "SELECT tb_calon.id_calon, tb_calon.username, tb_calon.nama, tb_calon.dapil, tb_calon.kategori, tb_calon.daerah AS id_daerah, tb_kabkota.nama AS daerah FROM tb_calon INNER JOIN tb_kabkota WHERE username='$username' AND password='$password' AND tb_calon.daerah = tb_kabkota.id_kabkota";
	} else {
		$query = "SELECT tb_calon.id_calon, tb_calon.username, tb_calon.nama, tb_calon.dapil, tb_calon.kategori, tb_calon.daerah FROM tb_calon WHERE username='$username' AND password='$password';";
	}

	$result = mysqli_query($con, $query);
	
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->message = "Selamat datang ".$row['username'];
		$response->id_calon = $row['id_calon'];
		$response->username = $row['username'];
		$response->nama = $row['nama'];
		$response->dapil = $row['dapil'];
		$response->kategori = $row['kategori'];
		$response->daerah = $row['daerah'];
		$response->id_daerah = $row['id_daerah'];
		die(json_encode($response));
		
	} else { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Username atau password salah";
		die(json_encode($response));
	}

} else {
	echo "DATABASE CONNECTION FAILED";
}
	
	mysql_close();

?>