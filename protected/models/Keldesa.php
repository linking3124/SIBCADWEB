<?php

/**
 * This is the model class for table "tb_keldesa".
 *
 * The followings are the available columns in table 'tb_keldesa':
 * @property integer $id_keldesa
 * @property string $nama
 * @property integer $id_kec
 *
 * The followings are the available model relations:
 * @property TbKec $idKec
 * @property TbTps[] $tbTps
 */
class Keldesa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_keldesa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, id_kec', 'required'),
			array('id_kec', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_keldesa, nama, id_kec', 'safe', 'on'=>'search'),
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
			'idKec' => array(self::BELONGS_TO, 'TbKec', 'id_kec'),
			'tbTps' => array(self::HAS_MANY, 'TbTps', 'id_keldesa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_keldesa' => 'Id Keldesa',
			'nama' => 'Nama',
			'id_kec' => 'Id Kec',
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

		$criteria->compare('id_keldesa',$this->id_keldesa);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('id_kec',$this->id_kec);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Keldesa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
