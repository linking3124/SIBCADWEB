<?php
/* @var $this KabkotaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kabkotas',
);

$this->menu=array(
	array('label'=>'Create Kabkota', 'url'=>array('create')),
	array('label'=>'Manage Kabkota', 'url'=>array('admin')),
);
?>

<h1>Kabkotas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
