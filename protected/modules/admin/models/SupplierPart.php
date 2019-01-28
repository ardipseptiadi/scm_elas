<?php

/**
 * This is the model class for table "hb_supplier_part".
 *
 * The followings are the available columns in table 'hb_supplier_part':
 * @property integer $id_supplier_part
 * @property integer $id_supplier
 * @property integer $id_part
 */
class SupplierPart extends CActiveRecord
{
	public $nama;
	public $alamat;
	public $kode_bank;
	public $no_telpon;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hb_supplier_part';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_supplier, id_part', 'required'),
			array('id_supplier, id_part', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_supplier_part, id_supplier, id_part,nama,alamat,kode_bank', 'safe', 'on'=>'search'),
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
			'idSupplier' => array(self::BELONGS_TO, 'Supplier', 'id_supplier'),
			'idPart' => array(self::BELONGS_TO, 'Part', 'id_part'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_supplier_part' => 'Id Supplier Part',
			'id_supplier' => 'Id Supplier',
			'id_part' => 'Id Part',
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

		$criteria->compare('id_supplier_part',$this->id_supplier_part);
		$criteria->compare('id_supplier',$this->id_supplier);
		$criteria->compare('id_part',$this->id_part);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SupplierPart the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
