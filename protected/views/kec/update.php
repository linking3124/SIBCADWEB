<?php
/* @var $this KecController */
/* @var $model Kec */

$this->breadcrumbs=array(
	'Kecs'=>array('index'),
	$model->id_kec=>array('view','id'=>$model->id_kec),
	'Update',
);

$this->menu=array(
	// array('label'=>'List Kec', 'url'=>array('index')),
	// array('label'=>'Create Kec', 'url'=>array('create')),
	// array('label'=>'View Kec', 'url'=>array('view', 'id'=>$model->id_kec)),
	// array('label'=>'Manage Kec', 'url'=>array('admin')),
);
?>

<!-- <h1>Update Kec <?php echo $model->id_kec; ?></h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>