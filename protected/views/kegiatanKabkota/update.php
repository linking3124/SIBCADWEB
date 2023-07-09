<?php
/* @var $this KegiatanKabkotaController */
/* @var $model KegiatanKabkota */

$this->breadcrumbs=array(
	'Kegiatan Kabkotas'=>array('index'),
	$model->id_kegiatan=>array('view','id'=>$model->id_kegiatan),
	'Update',
);

$this->menu=array(
	array('label'=>'List KegiatanKabkota', 'url'=>array('index')),
	array('label'=>'Create KegiatanKabkota', 'url'=>array('create')),
	array('label'=>'View KegiatanKabkota', 'url'=>array('view', 'id'=>$model->id_kegiatan)),
	array('label'=>'Manage KegiatanKabkota', 'url'=>array('admin')),
);
?>

<h1>Update KegiatanKabkota <?php echo $model->id_kegiatan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>