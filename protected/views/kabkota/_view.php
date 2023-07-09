<?php
/* @var $this KabkotaController */
/* @var $data Kabkota */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kabkota')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kabkota), array('view', 'id'=>$data->id_kabkota)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />


</div>