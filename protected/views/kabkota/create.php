<?php
/* @var $this KabkotaController */
/* @var $model Kabkota */

$this->breadcrumbs=array(
	'Kabkotas'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List Kabkota', 'url'=>array('index')),
	// array('label'=>'Manage Kabkota', 'url'=>array('admin')),
);
?>

<!-- <h1>Create Kabkota</h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>