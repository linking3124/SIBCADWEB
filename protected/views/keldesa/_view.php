<?php
/* @var $this KeldesaController */
/* @var $data Keldesa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_keldesa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_keldesa), array('view', 'id'=>$data->id_keldesa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kec')); ?>:</b>
	<?php echo CHtml::encode($data->id_kec); ?>
	<br />


</div>