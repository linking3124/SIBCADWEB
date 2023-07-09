<?php
/* @var $this KeldesaController */
/* @var $model Keldesa */

$this->breadcrumbs=array(
	'Keldesas'=>array('index'),
	$model->id_keldesa=>array('view','id'=>$model->id_keldesa),
	'Update',
);

$this->menu=array(
	// array('label'=>'List Keldesa', 'url'=>array('index')),
	// array('label'=>'Create Keldesa', 'url'=>array('create')),
	// array('label'=>'View Keldesa', 'url'=>array('view', 'id'=>$model->id_keldesa)),
	// array('label'=>'Manage Keldesa', 'url'=>array('admin')),
);
?>

<!-- <h1>Update Keldesa <?php echo $model->id_keldesa; ?></h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>