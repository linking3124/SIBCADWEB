<?php
/* @var $this CalonController */
/* @var $data Calon */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->username)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dapil')); ?>:</b>
	<?php echo CHtml::encode($data->dapil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kabkota')); ?>:</b>
	<?php echo CHtml::encode($data->id_kabkota); ?>
	<br />


</div>