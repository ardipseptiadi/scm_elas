<?php
Yii::import('application.modules.admin.models.*');

/**
 * This is the model class for table "el_bahanbaku_stock".
 *
 * The followings are the available columns in table 'el_bahanbaku_stock':
 * @property integer $id_bahanbaku
 * @property integer $init_stock
 * @property integer $qty_in_hand
 * @property string $last_update
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property HbPart $idBahanbaku
 */
class BahanbakuStock extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'el_bahanbaku_stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_bahanbaku, last_update, updated_by', 'required'),
			array('id_bahanbaku, init_stock, qty_in_hand', 'numerical', 'integerOnly'=>true),
			array('updated_by', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_bahanbaku, init_stock, qty_in_hand, last_update, updated_by', 'safe', 'on'=>'search'),
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
			'idBahanbaku' => array(self::BELONGS_TO, 'BahanBaku', 'id_bahanbaku'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_bahanbaku' => 'Id Bahanbaku',
			'init_stock' => 'Init Stock',
			'qty_in_hand' => 'Qty In Hand',
			'last_update' => 'Last Update',
			'updated_by' => 'Updated By',
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

		$criteria->compare('id_bahanbaku',$this->id_bahanbaku);
		$criteria->compare('init_stock',$this->init_stock);
		$criteria->compare('qty_in_hand',$this->qty_in_hand);
		$criteria->compare('last_update',$this->last_update,true);
		$criteria->compare('updated_by',$this->updated_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BahanbakuStock the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
