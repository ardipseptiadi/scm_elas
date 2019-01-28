<?php

/**
 * This is the model class for table "hb_pelanggan".
 *
 * The followings are the available columns in table 'hb_pelanggan':
 * @property integer $id_pelanggan
 * @property integer $id_kota
 * @property string $nama
 * @property string $alamat
 *
 * The followings are the available model relations:
 * @property Kota $idKota
 */
class Pelanggan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hb_pelanggan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kota, nama', 'required'),
			array('id_kota', 'numerical', 'integerOnly'=>true),
			array('nama, alamat,no_telepon', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pelanggan, id_kota, nama, alamat,no_telepon', 'safe', 'on'=>'search'),
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
			'idKota' => array(self::BELONGS_TO, 'Kota', 'id_kota'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pelanggan' => 'Id Pelanggan',
			'id_kota' => 'Id Kota',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'no_telepon' => 'No Telepon',
			'jarak' => 'Jarak (meter)'
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

		$criteria->compare('id_pelanggan',$this->id_pelanggan);
		$criteria->compare('id_kota',$this->id_kota);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pelanggan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
