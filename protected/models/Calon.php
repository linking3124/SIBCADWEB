<?php

/**
 * This is the model class for table "tb_calon".
 *
 * The followings are the available columns in table 'tb_calon':
 * @property integer $id_calon
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $dapil
 *
 * The followings are the available model relations:
 * @property TbKabkota $idKabkota
 */
class Calon extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_calon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, nama, dapil, kategori, daerah', 'required'),
			array('username, nama, dapil', 'length', 'max'=>100),
			array('kategori', 'length', 'max'=>50),
			array('password', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_calon, username, password, nama, dapil, kategori, daerah', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_calon' => 'Id Calon',
			'username' => 'Username',
			'password' => 'Password',
			'nama' => 'Nama',
			'dapil' => 'Dapil',
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_calon',$this->id_calon);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('dapil',$this->apil,true);
		$criteria->compare('kategori',$this->kategori,true);
		$criteria->compare('daerah',$this->daerah,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getAll(){
		$sql = "SELECT tb_calon.id_calon, tb_calon.username, tb_calon.password, tb_calon.nama, tb_calon.dapil, tb_calon.kategori, tb_calon.daerah FROM tb_calon";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;
	}

	public function getAllKatProvinsi(){
		$sql = "SELECT tb_calon.id_calon, tb_calon.username, tb_calon.password, tb_calon.nama, tb_calon.dapil, tb_calon.kategori FROM tb_calon WHERE tb_calon.kategori = 'pengawas'";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;
	}

	public function getAllKatKabkota(){
		$sql = "SELECT tb_calon.id_calon, tb_calon.username, tb_calon.password, tb_calon.nama, tb_calon.dapil, tb_calon.kategori, tb_calon.daerah, tb_kabkota.nama AS nama_kabkota FROM tb_calon INNER JOIN tb_kabkota WHERE tb_calon.kategori = 'office boy' AND tb_calon.daerah = tb_kabkota.id_kabkota";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Calon the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
