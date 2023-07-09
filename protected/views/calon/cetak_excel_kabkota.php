<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=BCAD_Kabkota.xls");

?>

<table border="1">
	<tr>
		<th>#</th>
		<th>Nama Calon</th>
		<th>Username</th>
		<th>Password</th>
		<th>No Identitas</th>
		<th>Kategori</th>
		<th>Kampus</th>
	</tr>
	<?php
										// print_r($model); // testing pemanggilan data
									?>

								<?php $no = 1; ?>
								<?php foreach ($getAllKatKabkota as $data) : ?>

									
									<tr>
										<td><?php echo $no;?></td>
										<td><?= $data['nama']; ?></td>
										<td><?= $data['username']; ?></td>
										<td><?= $data['password']; ?></td>
										<td><?= $data['dapil']; ?></td>
										<td><?= $data['kategori']; ?></td>
										<td><?= $data['Kampus']; ?></td>
									</tr>
									<?php $no++; ?>
								<?php endforeach; ?>

						</table>