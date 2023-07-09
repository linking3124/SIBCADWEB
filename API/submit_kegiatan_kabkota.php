<?php
include 'koneksi.php';

$con = mysqli_connect($server, $user_name, $password, $db_name);
if($con)
{

	$id_calon = mysqli_real_escape_string($con ,$_POST['id_calon']);

	$nama = mysqli_real_escape_string($con ,$_POST['nama']);
	
	$id_kec = mysqli_real_escape_string($con ,$_POST['id_kec']);
	
	$id_keldesa = mysqli_real_escape_string($con ,$_POST['id_keldesa']);
	
	$jumlah_peserta = mysqli_real_escape_string($con ,$_POST['jumlah_peserta']);
	
	$tanggal = mysqli_real_escape_string($con ,$_POST['tanggal']);
	
	$jenis = mysqli_real_escape_string($con, $_POST['jenis']);
	
	$lat = mysqli_real_escape_string($con ,$_POST['lat']);
	
	$lng = mysqli_real_escape_string($con ,$_POST['lng']);
	
	$foto = mysqli_real_escape_string($con ,$_POST['foto']);

	$foto2 = mysqli_real_escape_string($con ,$_POST['foto2']);

	$foto3 = mysqli_real_escape_string($con ,$_POST['foto3']);

	$foto4 = mysqli_real_escape_string($con ,$_POST['foto4']);
	
	$keterangan = mysqli_real_escape_string($con ,$_POST['keterangan']);
	$status = 0;

	$query = "insert into tb_kegiatan_kabkota(id_calon, nama, id_kec, id_keldesa, jumlah_peserta, tanggal, jenis, lat, lng, foto, foto2, foto3, foto4, keterangan, status) values ('$id_calon', '$nama', '$id_kec', '$id_keldesa', '$jumlah_peserta', '$tanggal', '$jenis', '$lat', '$lng', '$foto', '$foto2', '$foto3', '$foto4', '$keterangan', '$status')";

	$result = mysqli_query($con, $query);

	$last_id = mysqli_query($con, 'SELECT MAX(id_kegiatan) AS total FROM tb_kegiatan_kabkota');
	$row = mysqli_fetch_array($last_id, MYSQLI_ASSOC);

	$id_recent = (int)$row["total"];

	$query_insert_notif = mysqli_query($con, "INSERT INTO tb_notifikasi_kegiatan(id_kegiatan, sudah_dibaca, kategori) VALUES ('$id_recent', '0', 'office boy')");

	if($result)
	{
		$status = '1';
	}
	else
	{
	$status = '0';
	}	
}
else { $status = 'DATABASE CONNECTION FAILED'; }

echo json_encode(array("success"=>$status));

mysqli_close($con);
?>
