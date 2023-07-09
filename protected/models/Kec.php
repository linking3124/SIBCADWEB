<?php

/**
 * This is the model class for table "tb_kec".
 *
 * The followings are the available columns in table 'tb_kec':
 * @property integer $id_kec
 * @property string $nama
 * @property integer $id_kabkota
 *
 * The followings are the available model relations:
 * @property TbKabkota $idKabkota
 * @property TbKeldesa[] $tbKeldesas
 */
class Kec extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_kec';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, id_kabkota', 'required'),
			array('id_kabkota', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kec, nama, id_kabkota', 'safe', 'on'=>'search'),
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
			'tbKeldesas' => array(self::HAS_MANY, 'TbKeldesa', 'id_kec'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kec' => 'Id Kec',
			'nama' => 'Nama',
			'id_kabkota' => 'Id Kabkota',
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

		$criteria->compare('id_kec',$this->id_kec);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('id_kabkota',$this->id_kabkota);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getListIdNamaByPk($id){
		$sql = "SELECT tb_kec.id_kec, tb_kec.nama FROM tb_kec WHERE tb_kec.id_kabkota = $id";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;
	}

	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kec the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
