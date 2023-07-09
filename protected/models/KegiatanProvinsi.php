<?php

/**
 * This is the model class for table "tb_kegiatan".
 *
 * The followings are the available columns in table 'tb_kegiatan':
 * @property integer $id_kegiatan
 * @property integer $id_calon
 * @property string $nama
 * @property string $tanggal
 * @property string $jenis
 * @property double $lat
 * @property double $lng
 * @property string $foto
 * @property string $keterangan
 *
 * The followings are the available model relations:
 * @property TbCalon $idCalon
 */
class KegiatanProvinsi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_kegiatan_provinsi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_calon, nama, tanggal, jenis, lat, lng, foto', 'required'),
			array('id_calon', 'numerical', 'integerOnly'=>true),
			array('lat, lng', 'numerical'),
			array('nama, foto, foto2, foto3, foto4', 'length', 'max'=>255),
			array('jenis', 'length', 'max'=>100),
			array('keterangan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kegiatan, id_calon, nama, tanggal, jenis, lat, lng, foto, foto2, foto3, foto4, keterangan', 'safe', 'on'=>'search'),
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
			'idCalon' => array(self::BELONGS_TO, 'TbCalon', 'id_calon'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kegiatan' => 'Id Kegiatan',
			'id_calon' => 'Id Calon',
			'nama' => 'Nama',
			'tanggal' => 'Tanggal',
			'jenis' => 'Jenis',
			'lat' => 'Lat',
			'lng' => 'Lng',
			'foto' => 'Foto',
			'foto2' => 'Foto2',
			'foto3' => 'Foto3',
			'foto4' => 'Foto4',
			'keterangan' => 'Keterangan',
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
		$criteria->compare('id_calon',$this->id_calon);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('jenis',$this->jenis,true);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('lng',$this->lng);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('foto2',$this->foto2,true);
		$criteria->compare('foto3',$this->foto3,true);
		$criteria->compare('foto4',$this->foto4,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getAll(){
		$sql = "SELECT tb_kegiatan_provinsi.id_kegiatan, tb_kegiatan_provinsi.id_calon, tb_kegiatan_provinsi.nama AS nama_kegiatan, tb_kegiatan_provinsi.id_kabkota, tb_kegiatan_provinsi.id_kec, tb_kegiatan_provinsi.id_keldesa, tb_kegiatan_provinsi.jumlah_peserta, tb_kegiatan_provinsi.tanggal, tb_kegiatan_provinsi.jenis, tb_kegiatan_provinsi.lat, tb_kegiatan_provinsi.lng, tb_kegiatan_provinsi.foto, tb_kegiatan_provinsi.keterangan, tb_calon.nama AS nama_calon FROM tb_kegiatan_provinsi INNER JOIN tb_calon WHERE tb_kegiatan_provinsi.id_calon = tb_calon.id_calon ORDER BY tb_kegiatan_provinsi.tanggal DESC;";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;
	}

	public function getById($id){
		$sql = "SELECT tb_kegiatan_provinsi.id_kegiatan, tb_kegiatan_provinsi.id_calon, tb_kegiatan_provinsi.nama AS nama_kegiatan, tb_kegiatan_provinsi.id_kec, tb_kegiatan_provinsi.id_keldesa, tb_kegiatan_provinsi.jumlah_peserta, tb_kegiatan_provinsi.tanggal, tb_kegiatan_provinsi.jenis, tb_kegiatan_provinsi.lat, tb_kegiatan_provinsi.lng, tb_kegiatan_provinsi.foto, tb_kegiatan_provinsi.keterangan, tb_calon.nama AS nama_calon FROM tb_kegiatan_provinsi INNER JOIN tb_calon WHERE tb_kegiatan_provinsi.id_calon = tb_calon.id_calon AND tb_kegiatan_provinsi.id_calon = $id ORDER BY tb_kegiatan_provinsi.tanggal DESC;";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;
	}

	public function getPemilikKegiatan($id){
		$sql = "SELECT tb_calon.nama FROM tb_kegiatan_provinsi INNER JOIN tb_calon WHERE tb_kegiatan_provinsi.id_calon = tb_calon.id_calon AND id_kegiatan =$id;";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;	
	}

	public function getAllCountPerJenis(){
		$sql = "SELECT
    			COUNT(CASE WHEN jenis LIKE '%Ruangan%' THEN 1 END) AS Ruangan,
   				COUNT(CASE WHEN jenis LIKE '%Lantai%' THEN 1 END) AS Lantai,
   				COUNT(CASE WHEN jenis LIKE '%Gedung%' THEN 1 END) AS Gedung,
   				COUNT(CASE WHEN jenis LIKE '%Toilet%' THEN 1 END) AS Toilet,
   				COUNT(CASE WHEN jenis LIKE '%Gudang%' THEN 1 END) AS Gudang,
   				COUNT(CASE WHEN jenis LIKE '%HalamanTaman%' THEN 1 END) AS HalamanTaman,
   				COUNT(CASE WHEN jenis LIKE '%Lainnya%' THEN 1 END) AS lainnya
   				FROM tb_kegiatan_provinsi;";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;
	}

	public function getAllCountPerJenisByPk($id){
		$sql = "SELECT
    			COUNT(CASE WHEN jenis LIKE '%Ruangan%' THEN 1 END) AS Ruangan,
   				COUNT(CASE WHEN jenis LIKE '%Lantai%' THEN 1 END) AS Lantai,
   				COUNT(CASE WHEN jenis LIKE '%Gedung%' THEN 1 END) AS Gedung,
   				COUNT(CASE WHEN jenis LIKE '%Toilet%' THEN 1 END) AS Toilet,
   				COUNT(CASE WHEN jenis LIKE '%Gudang%' THEN 1 END) AS Gudang,
   				COUNT(CASE WHEN jenis LIKE '%HalamanTaman%' THEN 1 END) AS HalamanTaman,
   				COUNT(CASE WHEN jenis LIKE '%Lainnya%' THEN 1 END) AS lainnya
   				FROM tb_kegiatan_provinsi WHERE tb_kegiatan_provinsi.id_calon = '$id'";

		$model = Yii::app()->db
			->createCommand($sql)
			->queryAll();
		return $model;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kegiatan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
