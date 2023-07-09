<?php
/* @var $this CalonController */
/* @var $model Calon */

$this->breadcrumbs=array(
	// 'Calons'=>array('index'),
	// 'Manage',
);

$this->menu=array(
	// array('label'=>'List Calon', 'url'=>array('index')),
	// array('label'=>'Create Calon', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#calon-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- <h1>Manage Calons</h1>

<div class="row">
		<div class="col-md-12">

			<!-- TABLE STRIPED -->
			<!-- <div class="panel"> -->
				<div class="">
					<div class="col-md-6">
					<h3><i class="fa fa-user"></i> Kelola Akun Pengawas</h3>

				</div>
				<div class="col-md-6 text-right">
				<i class="fa fa-plus m-right-xs"></i> 
                                    <?php
                                     echo CHtml::Button('Tambah Akun ',array('onClick'=>"location='create'", 'class'=>'btn btn-primary')); 
                                     ?>
				</div>
				
					<!-- <div class="col-md-6 text-right">
					<button onclick="location='<?= Yii::app()->request->baseUrl?>/index.php/calon/cetakExcelProvinsi'" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export excel</button>
                            </div> -->

					
					
				</div>
				<div class="panel-body">
					<table id="example" class="table table-striped jambo_table bulk-action" cellspacing="0" width="100%">
						<br>
						<br>
						<div class="x_title">
							<br>
					</div>
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Pengawas</th>
								<th>Username</th>
								<th>Password</th>
								<th>No Identitas</th>
								<th>Kategori</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>

									<?php
										// print_r($model); // testing pemanggilan data
									?>

								<?php $no = 1; ?>
								<?php foreach ($getAllKatProvinsi as $data) : ?>

									
									<tr>
										<td><?php echo $no;?></td>
										<td><?= $data['nama']; ?></td>
										<td><?= $data['username']; ?></td>
										<td><?= $data['password']; ?></td>
										<td><?= $data['dapil']; ?></td>
										<td><?= $data['kategori']; ?></td>
										<td>
										<!--<div class="hidden-sm hidden-xs action-buttons">-->
											<!-- <a title="Lihat seluruh kegiatan <?= $data['nama']; ?>" class="btn btn-success btn-xs" href="viewProvinsi/<?= $data['id_calon']; ?>" role="button"><i class="fa fa-search"></i> Lihat Peta<i class="fa fa-map-marker"></i></a> -->
											<a title="Edit data <?= $data['nama']?>" class="btn btn-warning btn-xs" href="update/<?= $data['id_calon']; ?>" role="button"><i class="fa fa-pencil"></i></a>
											<a title="Hapus data <?= $data['nama']?>" class="btn btn-danger btn-xs" href="delete/<?= $data['id_calon']; ?>" role="button"  onclick="return confirm('Anda yakin ingin menghapus BCAD <?php echo $data['nama'];?>? Semua kegiatan dari <?php echo $data['nama']; ?> juga ikut terhapus')"><i class="fa fa-trash"></i></a>
											<!--</div>-->
											
											

										</td>
									</tr>
									<?php $no++; ?>
								<?php endforeach; ?>


							</tbody>
						</table>
					</div>



					<div class="">
					<div class="col-md-6">
						<h3><i class="fa fa-user"></i> Kelola Akun Office Boy</h3>

				</div>
				<!-- <div class="col-md-6 text-right">
				<i class="fa fa-plus m-right-xs"></i> 
                                    <?php
                                     echo CHtml::Button('Tambah akun Office Boy',array('onClick'=>"location='create'", 'class'=>'btn btn-primary')); 
                                     ?>
				</div>
				
					<div class="col-md-6 text-right">
					<button onclick="location='<?= Yii::app()->request->baseUrl?>/index.php/calon/cetakExcelKabkota'" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export excel</button>
                            </div> -->

					
					
				</div>
				<div class="panel-body">
					<table id="example2" class="table table-striped jambo_table bulk-action" cellspacing="0" width="100%">
						<br>
						<div class="x_title">
							<br>
					</div>
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Office Boy</th>
								<th>Username</th>
								<th>Password</th>
								<th>No Identitas</th>
								<th>Kategori</th>
								<th>Kampus</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>

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
										<td><?= $data['nama_kabkota'];?></td>
										<td>
										<!--<div class="hidden-sm hidden-xs action-buttons">-->
											<a title="Lihat seluruh kegiatan <?= $data['nama']; ?>" class="btn btn-success btn-xs" href="viewKabkota/<?= $data['id_calon']; ?>" role="button"><i class="fa fa-search"></i> Lihat Peta<i class="fa fa-map-marker"></i></a>
											<a title="Edit data <?= $data['nama']?>" class="btn btn-warning btn-xs" href="update/<?= $data['id_calon']; ?>" role="button"><i class="fa fa-pencil"></i></a>
											<a title="Hapus data <?= $data['nama']?>" class="btn btn-danger btn-xs" href="delete/<?= $data['id_calon']; ?>" role="button"  onclick="return confirm('Anda yakin ingin menghapus BCAD <?php echo $data['nama'];?>? Semua kegiatan dari <?php echo $data['nama']; ?> juga ikut terhapus')"><i class="fa fa-trash"></i></a>
											<!--</div>-->
											
											

										</td>
									</tr>
									<?php $no++; ?>
								<?php endforeach; ?>


							</tbody>
						</table>
					</div>




<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->
 
<?php
 //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); 
 ?>
<div class="search-form" style="display:none">
<?php
//  $this->renderPartial('_search',array(
// 	'model'=>$model,
// ));
 ?>
</div><!-- search-form -->




<?php
//  $this->widget('zii.widgets.grid.CGridView', array(
// 	'id'=>'calon-grid',
// 	'dataProvider'=>$model->search(),
// 	'filter'=>$model,
// 	'columns'=>array(
// 		'username',
// 		'password',
// 		'nama',
// 		'dapil',
// 		'id_kabkota',
// 		array(
// 			'class'=>'CButtonColumn',
// 		),
// 	),
// ));
 ?>
