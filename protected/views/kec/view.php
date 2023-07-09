<?php
/* @var $this KecController */
/* @var $model Kec */

$this->breadcrumbs=array(
	'Kecs'=>array('index'),
	$model->id_kec,
);

$this->menu=array(
// 	array('label'=>'List Kec', 'url'=>array('index')),
// 	array('label'=>'Create Kec', 'url'=>array('create')),
// 	array('label'=>'Update Kec', 'url'=>array('update', 'id'=>$model->id_kec)),
// 	array('label'=>'Delete Kec', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kec),'confirm'=>'Are you sure you want to delete this item?')),
// 	array('label'=>'Manage Kec', 'url'=>array('admin')),
 );
?>

<h2><i class="fa fa-user"></i> Lihat Data Gedung #<?php echo $model->id_kec; ?></h2>
<div class="x_title">
                    </div>

<div class="row">
        <div class="col-md-12">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
            	<a class="btn btn-primary" onclick="location='admin'"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<br><br>    

                <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $model->nama; ?>" alt="Avatar" title="<?php ?>">
                                </div>
                            </div>
                            <h3><?php ?></h3>

                            <ul class="list-unstyled user_data">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">ID Gedung</th>
                                        <td><?php echo $model->id_kec; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Gedung</th>
                                        <td><?php echo $model->nama; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </ul>

                        <a title="Edit Data Gedung" class="btn btn-warning col-md-12" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/kec/update/<?= $model->id_kec; ?>"><i class="fa fa-pencil"></i> Update Data</a>
                        <a onclick="return confirm('Anda yakin ingin menghapus <?php echo $model->nama;?> ? Semua Data yang ada di <?php echo $model->nama;?> juga ikut terhapus' )" title="Hapus Data Gedung" class="btn btn-danger col-md-12" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/kec/delete/<?= $model->id_kec; ?>"><i class="fa fa-trash"></i> Hapus Data</a>
                        </div>
<br>
<br>
<br>
                        <div class="col-md-9 col-sm-9 col-xs-15">
                            <div class="x_panel">

                                <div class="x_content">

                                    <!-- start accordion -->
                                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">ID Gedung</th>
                                                        <td><?php echo $model->id_kec; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nama Gedung</th>
                                                        <td><?php echo $model->nama; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ID Kampus</th>
                                                        <td><?php echo $model->id_kabkota; ?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of accordion -->


                                </div>
                            </div>
                        </div>
			</div>
		</div>
</div>

<?php 
// $this->widget('zii.widgets.CDetailView', array(
// 	'data'=>$model,
// 	'attributes'=>array(
// 		'id_kec',
// 		'nama',
// 		'id_kabkota',
// 	),
// ));
 ?>
