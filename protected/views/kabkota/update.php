<?php
/* @var $this KabkotaController */
/* @var $model Kabkota */

$this->breadcrumbs=array(
	'Kabkotas'=>array('index'),
	$model->id_kabkota=>array('view','id'=>$model->id_kabkota),
	'Update',
);

$this->menu=array(
	// array('label'=>'List Kabkota', 'url'=>array('index')),
	// array('label'=>'Create Kabkota', 'url'=>array('create')),
	// array('label'=>'View Kabkota', 'url'=>array('view', 'id'=>$model->id_kabkota)),
	// array('label'=>'Manage Kabkota', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>