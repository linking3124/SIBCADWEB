<?php
/* @var $this KecController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kecs',
);

$this->menu=array(
	array('label'=>'Create Kec', 'url'=>array('create')),
	array('label'=>'Manage Kec', 'url'=>array('admin')),
);
?>

<h1>Kecs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
