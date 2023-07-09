<?php
/* @var $this KeldesaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Keldesas',
);

$this->menu=array(
	array('label'=>'Create Keldesa', 'url'=>array('create')),
	array('label'=>'Manage Keldesa', 'url'=>array('admin')),
);
?>

<h1>Keldesas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
