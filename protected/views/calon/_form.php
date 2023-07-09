<?php
/* @var $this CalonController */
/* @var $model Calon */
/* @var $form CActiveForm */
?>

<?php
// initiate
// do not delete
$baseUrl = Yii::app()->request->baseUrl;
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'calon-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<!-- Form baru -->

	<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-tasks"></i> Tambah Akun  <small><!-- different form elements --></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />


	<!--  -->


	<?php echo $form->errorSummary($model); ?>

	<div class="col-md-6 col-md-offset-3">
<p class="note">Form dengan tanda <span class="required">*</span> wajib diisi.</p>

	<div class="form-group">
		<label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Username *</label>
    <div class="col-sm-9">
		<?php echo $form->textField($model,'username',array('class'=>'form-control has-feedback-left', 'placeholder'=>'contoh: Fajar','size'=>60,'maxlength'=>100,'required'=>'required')); ?>
    <span class="fa fa-text-width form-control-feedback left" aria-hidden="true"></span>
    </div>
		<?php echo $form->error($model,'username'); ?>
	</div>
  <div class="clearfix"></div>
  <br>

  <div class="form-group">
		<label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Password *</label>
    <div class="col-sm-9">
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control has-feedback-left', 'placeholder'=>'contoh: password','size'=>60,'maxlength'=>255,'required'=>'required')); ?>
    <span class="fa fa-text-width form-control-feedback left" aria-hidden="true"></span>
    </div>
		<?php echo $form->error($model,'password'); ?>
	</div>
  <div class="clearfix"></div>
  <br>

  <div class="form-group">
		<label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Nama *</label>
    <div class="col-sm-9">
		<?php echo $form->textField($model,'nama',array('class'=>'form-control has-feedback-left', 'placeholder'=>'contoh: Fajar Gunawan','size'=>60,'maxlength'=>100,'required'=>'required')); ?>
    <span class="fa fa-text-width form-control-feedback left" aria-hidden="true"></span>
    </div>
		<?php echo $form->error($model,'nama'); ?>
	</div>
  <div class="clearfix"></div>
  <br>	

  <div class="form-group">
		<label class="col-sm-3 controll-label no-padding-right" for="form-field-1">No Identitas *</label>
    <div class="col-sm-9">
		<?php echo $form->textField($model,'dapil',array('class'=>'form-control has-feedback-left', 'placeholder'=>'contoh: 10107026','required'=>'required')); ?>
    <span class="fa fa-text-width form-control-feedback left" aria-hidden="true"></span>
    </div>
		<?php echo $form->error($model,'dapil'); ?>
	</div>
  <div class="clearfix"></div>
  <br>	
	
	<div class="form-group">
 <label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Kategori *</label>
    <div class="col-sm-9">
 
 <?php echo $form->dropDownList($model,'kategori',
 array(
  'office boy'=>'office boy',
  'pengawas'=>'pengawas',
 ),array('id'=>'kategori','class'=>'form-control has-feedback-left','required'=>'required')
 ); ?> 
 <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
      </div>
      <?php echo $form->error($model,'kategori'); ?>
    </div>
  <div class="clearfix"></div>
  <br>


<!-- <?php
if ($model->kategori == "office boy"){ 
?>
  <div id="form_daerah" class="form-group" style="display: none;">
<?php 
  } else if ($model->kategori == "pengawas"){
?>
<div id="form_daerah" class="form-group" style="display: block;">
<?php } else {
?>
<div id="form_daerah" class="form-group" style="display: block;">
<?php }?> -->

      <label class="col-sm-3 controll-label no-padding-right" for="form-field-1">Kampus *</label>
      <div class="col-sm-9">
        <?php
        $opt = CHtml::listData(Kabkota::model()->getListIdNama(),'id_kabkota','nama');
        echo $form->dropDownList($model,'daerah',$opt,array('id'=>'daerah','class'=>'form-control has-feedback-left','required'=>'required'));
        ?>
        <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
      </div>
      <?php echo $form->error($model,'daerah'); ?>
    </div>
  <div class="clearfix"></div>
  <br>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#kategori").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
            
            if (selectedValue == "pengawas"){
              
              $('#form_daerah').toggle(false);
            } else if (selectedValue == "office boy") {
              $('#form_daerah').toggle(true);
            }
        });
    });
</script>

	<div class="col-md-6 col-md-offset-4">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan Data' : 'Save', array('class'=>'btn btn-primary')); ?>
    <?php echo CHtml::Button('Batal',array('onClick'=>"location='$baseUrl/index.php/calon/admin'", 'class'=>'btn btn-default')); ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->