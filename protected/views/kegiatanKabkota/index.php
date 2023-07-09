<?php
/* @var $this KegiatanKabkotaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kegiatan Kabkotas',
);

$this->menu=array(
	array('label'=>'Create KegiatanKabkota', 'url'=>array('create')),
	array('label'=>'Manage KegiatanKabkota', 'url'=>array('admin')),
);
?>

<h1>Kegiatan Kabkotas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
