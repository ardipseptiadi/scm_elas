<?php

/**
 * This is the model class for table "hb_kendaraan_perusahaan".
 *
 * The followings are the available columns in table 'hb_kendaraan_perusahaan':
 * @property integer $id_kendaraan
 * @property integer $id_jenis_kendaraan
 * @property integer $id_petugas
 * @property string $no_polisi
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property JenisKendaraanPerusahaan $idJenisKendaraan
 */
class KendaraanPerusahaan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hb_kendaraan_perusahaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_jenis_kendaraan, id_petugas, no_polisi, status', 'required'),
			array('id_jenis_kendaraan, id_petugas, status', 'numerical', 'integerOnly'=>true),
			array('no_polisi', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kendaraan, id_jenis_kendaraan, id_petugas, no_polisi, status', 'safe', 'on'=>'search'),
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
			'idJenisKendaraan' => array(self::BELONGS_TO, 'JenisKendaraanPerusahaan', 'id_jenis_kendaraan'),
			'idPetugas' => array(self::BELONGS_TO, 'Petugas', 'id_petugas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kendaraan' => 'Id Kendaraan',
			'id_jenis_kendaraan' => 'Jenis Kendaraan',
			'id_petugas' => 'Petugas',
			'no_polisi' => 'No Polisi',
			'status' => 'Status',
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

		$criteria->compare('id_kendaraan',$this->id_kendaraan);
		$criteria->compare('id_jenis_kendaraan',$this->id_jenis_kendaraan);
		$criteria->compare('id_petugas',$this->id_petugas);
		$criteria->compare('no_polisi',$this->no_polisi,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KendaraanPerusahaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
