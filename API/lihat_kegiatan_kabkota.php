<?php
$id_calon = $_GET['id_calon'];
include 'koneksi.php';
 
$con = mysqli_connect($server, $user_name, $password, $db_name);
if($con)
{
	$query = "SELECT tb_kegiatan_kabkota.id_kegiatan, tb_kegiatan_kabkota.id_calon, 
	tb_kegiatan_kabkota.nama, tb_kegiatan_kabkota.id_kec, tb_kec.nama AS nama_kec, 
	tb_kegiatan_kabkota.id_keldesa, tb_keldesa.nama AS nama_keldesa, tb_kegiatan_kabkota.jumlah_peserta, 
	tb_kegiatan_kabkota.tanggal, tb_kegiatan_kabkota.jenis, tb_kegiatan_kabkota.lat, tb_kegiatan_kabkota.lng,
	tb_kegiatan_kabkota.foto, tb_kegiatan_kabkota.keterangan, tb_kegiatan_kabkota.status FROM tb_kegiatan_kabkota INNER JOIN tb_kec,
	tb_keldesa WHERE tb_kegiatan_kabkota.id_kec = tb_kec.id_kec AND tb_kegiatan_kabkota.id_keldesa = tb_keldesa.id_keldesa AND id_calon = $id_calon ORDER BY tanggal DESC";

	$result = mysqli_query($con, $query);

	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$dateConvert = date_create($r['tanggal']); 
		$r['tanggal'] = date_format($dateConvert, 'j F Y, \p\u\k\u\l G:i:s');
		$rows[] = $r;
	}
}
else { $status = 'DATABASE CONNECTION FAILED'; }

echo '{"results":'.json_encode($rows).'}';

mysqli_close($con);
?>