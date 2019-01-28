<?php

/**
 * This is the model class for table "hb_supplier".
 *
 * The followings are the available columns in table 'hb_supplier':
 * @property integer $id_supplier
 * @property string $nama
 * @property string $alamat
 * @property string $no_telpon
 */
class Supplier extends CActiveRecord
{
	public $id_part;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hb_supplier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama', 'required'),
			array('nama, alamat', 'length', 'max'=>50),
			array('no_telpon,kode_bank', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_supplier, nama, alamat, no_telpon, kode_bank', 'safe', 'on'=>'search'),
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
			'idSupplierPart' => array(self::BELONGS_TO, 'SupplierPart', 'id_supplier'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_supplier' => 'Id Supplier',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'no_telpon' => 'No Telpon',
			'kode_bank' => 'Kode Bank',
			'id_part' => 'Part'
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

		$criteria->compare('id_supplier',$this->id_supplier);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telpon',$this->no_telpon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Supplier the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
