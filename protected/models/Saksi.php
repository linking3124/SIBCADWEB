<?php

/**
 * This is the model class for table "tb_saksi".
 *
 * The followings are the available columns in table 'tb_saksi':
 * @property integer $NIK
 * @property string $password
 * @property string $nama
 * @property integer $id_keldesa
 * @property integer $id_kec
 * @property integer $id_kabkota
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $hp
 * @property string $alamat
 * @property string $amanah
 *
 * The followings are the available model relations:
 * @property TbKabkota $idKabkota
 * @property TbKec $idKec
 * @property TbKeldesa $idKeldesa
 */
class Saksi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_saksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NIK, password, nama, id_keldesa, id_kec, id_kabkota, tempat_lahir, tanggal_lahir, hp, alamat, amanah', 'required'),
			array('NIK, id_keldesa, id_kec, id_kabkota', 'numerical', 'integerOnly'=>true),
			array('password', 'length', 'max'=>255),
			array('nama, tempat_lahir, amanah', 'length', 'max'=>100),
			array('hp', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NIK, password, nama, id_keldesa, id_kec, id_kabkota, tempat_lahir, tanggal_lahir, hp, alamat, amanah', 'safe', 'on'=>'search'),
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
			'idKabkota' => array(self::BELONGS_TO, 'TbKabkota', 'id_kabkota'),
			'idKec' => array(self::BELONGS_TO, 'TbKec', 'id_kec'),
			'idKeldesa' => array(self::BELONGS_TO, 'TbKeldesa', 'id_keldesa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NIK' => 'Nik',
			'password' => 'Password',
			'nama' => 'Nama',
			'id_keldesa' => 'Id Keldesa',
			'id_kec' => 'Id Kec',
			'id_kabkota' => 'Id Kabkota',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'hp' => 'Hp',
			'alamat' => 'Alamat',
			'amanah' => 'Amanah',
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

		$criteria->compare('NIK',$this->NIK);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('id_keldesa',$this->id_keldesa);
		$criteria->compare('id_kec',$this->id_kec);
		$criteria->compare('id_kabkota',$this->id_kabkota);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('amanah',$this->amanah,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	function getAll(){
		$sql = "SELECT tb_saksi.NIK, tb_saksi.password, tb_saksi.nama, tb_saksi.id_keldesa, tb_saksi.id_kec, tb_saksi.id_kabkota, tb_keldesa.nama AS keldesa, tb_kec.nama AS kec, tb_kabkota.nama AS kabkota, tb_saksi.tempat_lahir, tb_saksi.tanggal_lahir, tb_saksi.hp, tb_saksi.alamat, tb_saksi.amanah FROM tb_saksi INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_saksi.id_keldesa = tb_keldesa.id_keldesa AND tb_saksi.id_kec = tb_kec.id_kec AND tb_saksi.id_kabkota = tb_kabkota.id_kabkota ORDER BY tb_saksi.nama ASC;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;	
	}

	function getAllByKab($id){
		$sql = "SELECT tb_saksi.NIK, tb_saksi.password, tb_saksi.nama, tb_saksi.id_keldesa, tb_saksi.id_kec, tb_saksi.id_kabkota, tb_keldesa.nama AS keldesa, tb_kec.nama AS kec, tb_kabkota.nama AS kabkota, tb_saksi.tempat_lahir, tb_saksi.tanggal_lahir, tb_saksi.hp, tb_saksi.alamat, tb_saksi.amanah FROM tb_saksi INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_saksi.id_keldesa = tb_keldesa.id_keldesa AND tb_saksi.id_kec = tb_kec.id_kec AND tb_saksi.id_kabkota = tb_kabkota.id_kabkota AND tb_saksi.id_kabkota = $id ORDER BY tb_saksi.nama ASC;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;	
	}	

	function getByPk($id){
		$sql = "SELECT tb_saksi.NIK, tb_saksi.password, tb_saksi.nama, tb_saksi.id_keldesa, tb_saksi.id_kec, tb_saksi.id_kabkota, tb_keldesa.nama AS keldesa, tb_kec.nama AS kec, tb_kabkota.nama AS kabkota, tb_saksi.tempat_lahir, tb_saksi.tanggal_lahir, tb_saksi.hp, tb_saksi.alamat, tb_saksi.amanah FROM tb_saksi INNER JOIN tb_keldesa, tb_kec, tb_kabkota WHERE tb_saksi.id_keldesa = tb_keldesa.id_keldesa AND tb_saksi.id_kec = tb_kec.id_kec AND tb_saksi.id_kabkota = tb_kabkota.id_kabkota AND tb_saksi.NIK = $id;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;	
	}

	function getTotal(){
		$sql = "SELECT COUNT(NIK) as total FROM tb_saksi;";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;		
	}

	function getKab($id){
		$sql = "SELECT tb_kabkota.nama FROM tb_kabkota WHERE id_kabkota = $id";

		$model = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $model;	
	}

	public function kecList()
	{
		$models = Kec::model()->findAll(array('condition' => 'id_kabkota = ' . $this->id_kabkota, 'order'=> 'nama'));
		foreach ($models as $model)
			$_items[$model->id_kec] = $model->nama;
		return $_items;
	}

	public function keldesaList(){
		$models = Keldesa::model()->findAll(array('condition' => 'id_kec = ' . $this->id_kec, 'order'=> 'nama'));
		foreach ($models as $model)
			$_items[$model->id_keldesa] = $model->nama;
		return $_items;
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Saksi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
