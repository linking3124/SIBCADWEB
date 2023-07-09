<?php
include 'koneksi.php';

$con = mysqli_connect($server, $user_name, $password, $db_name);
if($con)
{
	$id_kegiatan = mysqli_real_escape_string($con ,$_POST['id_kegiatan']);

		$status = mysqli_real_escape_string($con ,$_POST['status']);
	

	$query = "UPDATE `tb_kegiatan_kabkota` SET `status`='1' WHERE id_kegiatan = $id_kegiatan";

	$result = mysqli_query($con, $query);

	$last_id = mysqli_query($con, 'SELECT MAX(id_kegiatan) AS total FROM tb_kegiatan_provinsi');
	$row = mysqli_fetch_array($last_id, MYSQLI_ASSOC);

	$id_recent = (int)$row["total"];

	$query_insert_notif = mysqli_query($con, "INSERT INTO tb_notifikasi_kegiatan (id_kegiatan, sudah_dibaca, kategori) VALUES ('$id_recent', '0', 'pengawas')");

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
