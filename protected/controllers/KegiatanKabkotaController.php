<?php

class KegiatanKabkotaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view','dataLokasi','dataLokasiAll'),
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
	//	NotifikasiKegiatan::model()->klikNotif($id);
		$modelPemilik = KegiatanKabkota::model()->getPemilikKegiatan($id);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'modelPemilik'=>$modelPemilik,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new KegiatanKabkota;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['KegiatanKabkota']))
		{
			$model->attributes=$_POST['KegiatanKabkota'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_kegiatan));
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

		if(isset($_POST['KegiatanKabkota']))
		{
			$model->attributes=$_POST['KegiatanKabkota'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_kegiatan));
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
		$dataProvider=new CActiveDataProvider('KegiatanKabkota');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$db=new KegiatanKabkota('search');
		$db->unsetAttributes();  // clear any default values
		if(isset($_GET['KegiatanKabkota']))
			$db->attributes=$_GET['KegiatanKabkota'];

		$model = KegiatanKabkota::model()->getAll();
		$getAllCountPerJenis = KegiatanKabkota::model()->getAllCountPerJenis();

		$this->render('admin',array(
			'model'=>$model,
			'getAllCountPerJenis'=>$getAllCountPerJenis,
			//'db'=>$db,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return KegiatanKabkota the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=KegiatanKabkota::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param KegiatanKabkota $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kegiatan-kabkota-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionDataLokasi($id)
	{

		$this->layout='mainxml';
			 // Parsing Karakter-Karakter Khusus
			 function parseToXML($htmlStr)
			 {
				  $xmlStr=str_replace('<','<',$htmlStr);
				  $xmlStr=str_replace('>','>',$xmlStr);
				  $xmlStr=str_replace('"','"',$xmlStr);
				  $xmlStr=str_replace("'","'",$xmlStr);
				  $xmlStr=str_replace("&",'&',$xmlStr);
				  return $xmlStr;
			 }
		 
		 	 
				$model = KegiatanKabkota::model()->getById($id);
			
		 
			 // Header File XML
			 header("Content-type: text/xml");
		 
			 // Parent node XML
			 echo '<markers>';
		 
			 // Iterasi baris, masing-masing menghasilkan node-node XML
			foreach($model as $db)
			{
				  // Menambahkan ke node dokumen XML
				  echo '<marker ';
				  echo 'id_kegiatan="' . parseToXML($db['id_kegiatan']) . '" ';
				  echo 'nama="' . parseToXML($db['nama_kegiatan']) . '" ';
				  $date = date_create($db['tanggal']); 
				  echo 'tanggal="' . date_format($date, 'j F Y, \p\u\k\u\l G:i') . '" ';
				  //echo 'tanggal="' . $db['tanggal'] . '" ';
				  echo 'jenis="' . $db['jenis'] . '" ';
				  echo 'foto="' . $db['foto'] . '" ';
				  echo 'lat="' . $db['lat'] . '" ';
				  echo 'lng="' . $db['lng'] . '" ';
				 
				  echo '/>';
			 }
		 
			 // Akhir File XML (tag penutup node)
			 echo '</markers>';

	}

	public function actionDataLokasiAll()
	{

		$this->layout='mainxml';
			 // Parsing Karakter-Karakter Khusus
			 function parseToXML($htmlStr)
			 {
				  $xmlStr=str_replace('<','<',$htmlStr);
				  $xmlStr=str_replace('>','>',$xmlStr);
				  $xmlStr=str_replace('"','"',$xmlStr);
				  $xmlStr=str_replace("'","'",$xmlStr);
				  $xmlStr=str_replace("&",'&',$xmlStr);
				  return $xmlStr;
			 }
		 
		 	 
				$model = KegiatanKabkota::model()->getAll();
			
		 
			 // Header File XML
			 header("Content-type: text/xml");
		 
			 // Parent node XML
			 echo '<markers>';
		 
			 // Iterasi baris, masing-masing menghasilkan node-node XML
			foreach($model as $db)
			{
				  // Menambahkan ke node dokumen XML
				  echo '<marker ';
				  echo 'id_kegiatan="' . parseToXML($db['id_kegiatan']) . '" ';
				  echo 'id_calon="' . parseToXML($db['id_calon']) . '" ';
				  echo 'nama="' . parseToXML($db['nama_kegiatan']) . '" ';
				  $date = date_create($db['tanggal']); 
				  echo 'tanggal="' . date_format($date, 'j F Y, \p\u\k\u\l G:i') . '" ';
				  //echo 'tanggal="' . $db['tanggal'] . '" ';
				  echo 'jenis="' . $db['jenis'] . '" ';
				  echo 'foto="' . $db['foto'] . '" ';
				  echo 'lat="' . $db['lat'] . '" ';
				  echo 'lng="' . $db['lng'] . '" ';
				 
				  echo '/>';
			 }
		 
			 // Akhir File XML (tag penutup node)
			 echo '</markers>';

	}
}

