<?php
/* @var $this KegiatanKabkotaController */
/* @var $model KegiatanKabkota */

$this->breadcrumbs=array(
	'Kegiatan Kabkotas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KegiatanKabkota', 'url'=>array('index')),
	array('label'=>'Manage KegiatanKabkota', 'url'=>array('admin')),
);
?>

<h1>Create KegiatanKabkota</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>