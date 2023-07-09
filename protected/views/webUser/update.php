<?php
/* @var $this WebUserController */
/* @var $model WebUser */

$kategori =Yii::app()->session->get('id_kategori');
$username =Yii::app()->session->get('username');

$this->breadcrumbs=array(
	'Web Users'=>array('index'),
	$model->id_web_user=>array('view','id'=>$model->id_web_user),
	'Update',
);

$this->menu=array(
	// array('label'=>'List WebUser', 'url'=>array('index')),
	// array('label'=>'Create WebUser', 'url'=>array('create')),
	// array('label'=>'View WebUser', 'url'=>array('view', 'id'=>$model->id_web_user)),
	// array('label'=>'Manage WebUser', 'url'=>array('admin')),
);
?>

<!-- <h1>Update WebUser <?php echo $model->id_web_user; ?></h1> -->

<?php

if($kategori>0){
	$this->renderPartial('_form2', array('model'=>$model)); 
} else if ($kategori!=1){
	
	if ($username == 'root'){
		$this->renderPartial('_form_root', array('model'=>$model)); 	
	} else {
		$this->renderPartial('_form', array('model'=>$model)); 	
	}
}

 ?>


