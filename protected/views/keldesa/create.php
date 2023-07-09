<?php
/* @var $this KeldesaController */
/* @var $model Keldesa */

$this->breadcrumbs=array(
	'Keldesas'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List Keldesa', 'url'=>array('index')),
	// array('label'=>'Manage Keldesa', 'url'=>array('admin')),
);
?>

<!-- <h1>Create Keldesa</h1> -->

<?php $this->renderPartial('_form', array('model'=>$model,'model_kabkota'=>$model_kabkota)); ?>