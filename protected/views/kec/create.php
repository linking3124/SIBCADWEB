<?php
/* @var $this KecController */
/* @var $model Kec */

$this->breadcrumbs=array(
	'Kecs'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List Kec', 'url'=>array('index')),
	// array('label'=>'Manage Kec', 'url'=>array('admin')),
);
?>

<!-- <h1>Create Kec</h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>