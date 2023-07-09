<?php
/* @var $this KegiatanKabkotaController */
/* @var $data KegiatanKabkota */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kegiatan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kegiatan), array('view', 'id'=>$data->id_kegiatan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_calon')); ?>:</b>
	<?php echo CHtml::encode($data->id_calon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kec')); ?>:</b>
	<?php echo CHtml::encode($data->id_kec); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_keldesa')); ?>:</b>
	<?php echo CHtml::encode($data->id_keldesa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_peserta')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_peserta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis')); ?>:</b>
	<?php echo CHtml::encode($data->jenis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lat')); ?>:</b>
	<?php echo CHtml::encode($data->lat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lng')); ?>:</b>
	<?php echo CHtml::encode($data->lng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	*/ ?>

</div>