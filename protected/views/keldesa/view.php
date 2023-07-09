<?php
/* @var $this KeldesaController */
/* @var $model Keldesa */

$this->breadcrumbs=array(
	'Keldesas'=>array('index'),
	$model->id_keldesa,
);

$this->menu=array(
// 	array('label'=>'List Keldesa', 'url'=>array('index')),
// 	array('label'=>'Create Keldesa', 'url'=>array('create')),
// 	array('label'=>'Update Keldesa', 'url'=>array('update', 'id'=>$model->id_keldesa)),
// 	array('label'=>'Delete Keldesa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_keldesa),'confirm'=>'Are you sure you want to delete this item?')),
// 	array('label'=>'Manage Keldesa', 'url'=>array('admin')),
 );
?>

<h2><i class="fa fa-user"></i> Lihat Data Ruangan #<?php echo $model->id_keldesa; ?></h2>
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
                                        <th scope="row">ID Ruangan</th>
                                        <td><?php echo $model->id_keldesa; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Ruangan</th>
                                        <td><?php echo $model->nama; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </ul>

                        <a title="Edit Data Ruangan" class="btn btn-warning col-md-12" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/keldesa/update/<?= $model->id_keldesa; ?>"><i class="fa fa-pencil"></i> Update Data</a>
                        <a onclick="return confirm('Anda yakin ingin menghapus data Ruangan <?php echo $model->nama;?> ? Semua data yang ada di <?php echo $model->nama;?> juga ikut terhapus' )" title="Hapus Data Ruangan" class="btn btn-danger col-md-12" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/keldesa/delete/<?= $model->id_keldesa; ?>"><i class="fa fa-trash"></i> Hapus Data</a>
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
                                                        <th scope="row">ID Ruangan</th>
                                                        <td><?php echo $model->id_keldesa; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nama Ruangan</th>
                                                        <td><?php echo $model->nama; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ID Gedung</th>
                                                        <td><?php echo $model->nama; ?></td>
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
// 		'id_keldesaa',
// 		'nama',
// 		'id_kec',
// 	),
// ));
 ?>
