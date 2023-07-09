<?php
/* @var $this CalonController */
/* @var $model Calon */

$this->breadcrumbs=array(
	'Calons'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Update',
);

$this->menu=array(
	// array('label'=>'List Calon', 'url'=>array('index')),
	// array('label'=>'Create Calon', 'url'=>array('create')),
	// array('label'=>'View Calon', 'url'=>array('view', 'id'=>$model->username)),
	// array('label'=>'Manage Calon', 'url'=>array('admin')),
);
?>

<!-- <h1>Update Calon <?php echo $model->username; ?></h1> -->

<?php $this->renderPartial('_form_kabkota', array('model'=>$model)); ?>