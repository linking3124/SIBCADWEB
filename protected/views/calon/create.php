<?php
/* @var $this CalonController */
/* @var $model Calon */

$this->breadcrumbs=array(
	// 'Calons'=>array('index'),
	// 'Create',
);

$this->menu=array(
	// array('label'=>'List Calon', 'url'=>array('index')),
	// array('label'=>'Manage Calon', 'url'=>array('admin')),
);
?>

<!-- <h1>Create Calon</h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>