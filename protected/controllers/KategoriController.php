<?php

class KategoriController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/blank';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
//			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','frontEnd','frontEndKegiatan','frontEndKegiatanKabkota','frontEndPascagub'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Kategori;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kategori']))
		{
			$model->attributes=$_POST['Kategori'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_kategori));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kategori']))
		{
			$model->attributes=$_POST['Kategori'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_kategori));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		// $dataProvider=new CActiveDataProvider('Kecelakaan');
		// $this->render('index',array(
		// 	'dataProvider'=>$dataProvider,
		// ));

		// direct to admin page
		$this->redirect("admin");
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$db=new Kategori('search');
		$db->unsetAttributes();  // clear any default values
		if(isset($_GET['Kategori']))
			$db->attributes=$_GET['Kategori'];

		$model = Kategori::model()->findAll();

		$this->render('admin',array(
			'model'=>$model,
			'db'=>$db,
		));
	}

	public function actionFrontEnd(){
		

		$model = User::model()->getCount();
		$modelgetCountTps = Tps::model()->getCountTps();
		$modelgetCountHasil = Hasil::model()->getCountHasil();
		$modelgetCountHasilPaslon1 = Hasil::model()->getCountHasilPaslon1();
		$modelgetCountHasilPaslon2 = Hasil::model()->getCountHasilPaslon2();
		$modelgetCountHasilPaslon3 = Hasil::model()->getCountHasilPaslon3();
		$modelgetCountHasilPaslon4 = Hasil::model()->getCountHasilPaslon4();
		$modelgetCountHasilPaslon1Persen = Hasil::model()->getCountHasilPaslon1Persen();
		$modelgetCountHasilPaslon2Persen = Hasil::model()->getCountHasilPaslon2Persen();
		$modelgetCountHasilPaslon3Persen = Hasil::model()->getCountHasilPaslon3Persen();
		$modelgetCountHasilPaslon4Persen = Hasil::model()->getCountHasilPaslon4Persen();
		// $modelCountLaka = Kecelakaan::model()->getCountLaka();
		// $modelCountKriminal = Kecelakaan::model()->getCountKriminal();
		// $modelCount = Kecelakaan::model()->getCount($kategori);

		
		$modelLengthKategori = Kategori::model()->getLengthKategori();
		$modelgetAllNamaKategori = Kategori::model()->getAllNamaKategori();

		

		
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		
			$this->render('guest',array(
			'model'=>$model,
			// 'modelCountLaka'=>$modelCountLaka,
			// 'modelCountKriminal'=>$modelCountKriminal,
			// 'modelCount'=>$modelCount,
			'modelLengthKategori'=>$modelLengthKategori,
			'modelgetAllNamaKategori'=>$modelgetAllNamaKategori,
			'modelgetCountTps'=>$modelgetCountTps,
			'modelgetCountHasil'=>$modelgetCountHasil,
			'modelgetCountHasilPaslon1'=>$modelgetCountHasilPaslon1,
			'modelgetCountHasilPaslon2'=>$modelgetCountHasilPaslon2,
			'modelgetCountHasilPaslon3'=>$modelgetCountHasilPaslon3,
			'modelgetCountHasilPaslon4'=>$modelgetCountHasilPaslon4,
			'modelgetCountHasilPaslon1Persen'=>$modelgetCountHasilPaslon1Persen,
			'modelgetCountHasilPaslon2Persen'=>$modelgetCountHasilPaslon2Persen,
			'modelgetCountHasilPaslon3Persen'=>$modelgetCountHasilPaslon3Persen,
			'modelgetCountHasilPaslon4Persen'=>$modelgetCountHasilPaslon4Persen,

		//	'db'=>$db,
		));
		
	}

	public function actionFrontEndKegiatan($id){

		$getAllCountPerJenisByPk = KegiatanProvinsi::model()->getAllCountPerJenisByPk($id);
		$this->render('kegiatan',array(
			'model'=>$this->loadModel($id),
			'getAllCountPerJenisByPk'=>$getAllCountPerJenisByPk,
		));
	}

	public function actionFrontEndKegiatanKabkota($id){

		$getAllCountPerJenisByPk = KegiatanKabkota::model()->getAllCountPerJenisByPk($id);
		$this->render('kegiatan_kabkota',array(
			'model'=>$this->loadModel($id),
			'getAllCountPerJenisByPk'=>$getAllCountPerJenisByPk,
		));
	}

	public function actionFrontEndPascagub($id){

		$getAllCountPerJenisByPk = KegiatanPascagub::model()->getAllCountPerJenisByPk($id);
		$this->render('kegiatan_pascagub',array(
			'model'=>$this->loadModelPascagub($id),
			'getAllCountPerJenisByPk'=>$getAllCountPerJenisByPk,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Kategori the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Calon::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelPascagub($id)
	{
		$model=Pascagub::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Kategori $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kategori-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
