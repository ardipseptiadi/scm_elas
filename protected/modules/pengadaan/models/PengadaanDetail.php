<?php

Yii::import('application.modules.admin.models.*');
Yii::import('application.modules.pemasaran.models.*');
Yii::import('application.modules.gudang.models.*');
/**
 * This is the model class for table "hb_pengadaan_detail".
 *
 * The followings are the available columns in table 'hb_pengadaan_detail':
 * @property integer $id_detail_pengadaaan
 * @property string $no_pengadaan
 * @property integer $id_part
 * @property integer $qty_pengadaan
 * @property integer $status
 * @property integer $id_pengadaan
 * @property double $harga_pengadaan
 * @property string $created_at
 */
class PengadaanDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hb_pengadaan_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_part, id_pengadaan,id_part_supplier, created_at', 'required'),
			array('id_part,id_part_supplier, qty_pengadaan, status, id_pengadaan', 'numerical', 'integerOnly'=>true),
			array('harga_pengadaan', 'numerical'),
			array('no_pengadaan', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_detail_pengadaaan, no_pengadaan, id_part,id_part_supplier, qty_pengadaan, status, id_pengadaan, harga_pengadaan, created_at', 'safe', 'on'=>'search'),
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
			'idPart' => array(self::BELONGS_TO,'Part','id_part'),
			'idPartSupplier' => array(self::BELONGS_TO,'SupplierPart','id_part_supplier')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_detail_pengadaaan' => 'Id Detail Pengadaaan',
			'no_pengadaan' => 'No Pengadaan',
			'id_part' => 'Id Part',
			'qty_pengadaan' => 'Qty Pengadaan',
			'status' => 'Status',
			'id_pengadaan' => 'Id Pengadaan',
			'harga_pengadaan' => 'Harga Pengadaan',
			'created_at' => 'Created At',
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

		$criteria->compare('id_detail_pengadaaan',$this->id_detail_pengadaaan);
		$criteria->compare('no_pengadaan',$this->no_pengadaan,true);
		$criteria->compare('id_part',$this->id_part);
		$criteria->compare('qty_pengadaan',$this->qty_pengadaan);
		$criteria->compare('status',$this->status);
		$criteria->compare('id_pengadaan',$this->id_pengadaan);
		$criteria->compare('harga_pengadaan',$this->harga_pengadaan);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PengadaanDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function afterSave()
	{
		if($this->isNewRecord){
			$mPartStock = PartStock::model()->findByPk($this->id_part);
			$mRiwayat = new RiwayatPersediaan;
			$mRiwayat->id_part = $this->id_part;
			$mRiwayat->jumlah = $this->qty_pengadaan;
			$mRiwayat->tgl_riwayat =date('Y-m-d');
			$mRiwayat->created_at = date('Y-m-d h:i:s');
			$mRiwayat->created_by = "pengadaan";
			if($mRiwayat->save()){
				$mPartStock->qty_in_hand = $mPartStock->qty_in_hand + $this->qty_pengadaan;
				$mPartStock->last_update = date('Y-m-d h:i:s');
				$mPartStock->updated_by = 'pengadaan';
				if($mPartStock->update()){
					return true;
				}else{
					var_dump($mPartStock->getErrors());exit;
				}
			}else{
				var_dump($mRiwayat->getErrors());exit;
			}
		}
	}
}
