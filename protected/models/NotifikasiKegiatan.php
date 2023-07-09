<?php

/**
 * This is the model class for table "tb_notifikasi_kegiatan".
 *
 * The followings are the available columns in table 'tb_notifikasi_kegiatan':
 * @property integer $id_kegiatan
 * @property integer $sudah_dibaca
 *
 * The followings are the available model relations:
 * @property TbKegiatan $idKegiatan
 */
class NotifikasiKegiatan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_notifikasi_kegiatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kegiatan, sudah_dibaca', 'required'),
			array('id_kegiatan, sudah_dibaca', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kegiatan, sudah_dibaca', 'safe', 'on'=>'search'),
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
			'idKegiatan' => array(self::BELONGS_TO, 'TbKegiatan', 'id_kegiatan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kegiatan' => 'Id Kegiatan',
			'sudah_dibaca' => 'Sudah Dibaca',
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

		$criteria->compare('id_kegiatan',$this->id_kegiatan);
		$criteria->compare('sudah_dibaca',$this->sudah_dibaca);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getCount()
	{
		$sql = "SELECT COUNT(id_kegiatan) FROM tb_notifikasi_kegiatan WHERE tb_notifikasi_kegiatan.sudah_dibaca = '0';";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;
	}

	public function getDataHasil()
	{
		$sql = "SELECT  tb_notifikasi_kegiatan.id_kegiatan, tb_notifikasi_kegiatan.sudah_dibaca, tb_calon.nama, tb_kegiatan_provinsi.tanggal, tb_kegiatan_provinsi.nama AS nama_kegiatan, tb_kegiatan_provinsi.foto FROM tb_notifikasi_kegiatan, tb_calon INNER JOIN tb_kegiatan_provinsi WHERE tb_notifikasi_kegiatan.id_kegiatan = tb_kegiatan_provinsi.id_kegiatan AND tb_kegiatan_provinsi.id_calon = tb_calon.id_calon AND tb_notifikasi_kegiatan.sudah_dibaca = '0' ORDER BY `tb_kegiatan_provinsi`.`tanggal` DESC;";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;
	}

	public function getDataHasilKabkota()
	{
		$sql = "SELECT  tb_notifikasi_kegiatan.id_kegiatan, tb_notifikasi_kegiatan.sudah_dibaca, tb_calon.nama, tb_kegiatan_kabkota.tanggal, tb_kegiatan_kabkota.nama AS nama_kegiatan, tb_kegiatan_kabkota.foto FROM tb_notifikasi_kegiatan, tb_calon INNER JOIN tb_kegiatan_kabkota WHERE tb_notifikasi_kegiatan.id_kegiatan = tb_kegiatan_kabkota.id_kegiatan AND tb_kegiatan_kabkota.id_calon = tb_calon.id_calon AND tb_notifikasi_kegiatan.sudah_dibaca = '0' ORDER BY `tb_kegiatan_kabkota`.`tanggal` DESC;";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;
	}

	public function klikNotif($id)
	{
		$sql = "UPDATE tb_notifikasi_kegiatan SET sudah_dibaca = '1' WHERE id_kegiatan = $id";

		$model = Yii::app()->db
			->createCommand($sql)
			->execute();
		return $model;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NotifikasiKegiatan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
