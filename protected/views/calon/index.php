<?php
/* @var $this CalonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calons',
);

$this->menu=array(
	array('label'=>'Create Calon', 'url'=>array('create')),
	array('label'=>'Manage Calon', 'url'=>array('admin')),
);
?>

<h1>Calons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
