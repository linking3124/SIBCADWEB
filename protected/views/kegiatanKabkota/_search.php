<?php
/* @var $this KegiatanKabkotaController */
/* @var $model KegiatanKabkota */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_kegiatan'); ?>
		<?php echo $form->textField($model,'id_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_calon'); ?>
		<?php echo $form->textField($model,'id_calon'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_kec'); ?>
		<?php echo $form->textField($model,'id_kec'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_keldesa'); ?>
		<?php echo $form->textField($model,'id_keldesa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_peserta'); ?>
		<?php echo $form->textField($model,'jumlah_peserta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis'); ?>
		<?php echo $form->textField($model,'jenis',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lat'); ?>
		<?php echo $form->textField($model,'lat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lng'); ?>
		<?php echo $form->textField($model,'lng'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'foto'); ?>
		<?php echo $form->textField($model,'foto',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keterangan'); ?>
		<?php echo $form->textArea($model,'keterangan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->