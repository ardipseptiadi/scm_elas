<?php

/**
 * This is the model class for table "el_riwayat_persediaan".
 *
 * The followings are the available columns in table 'el_riwayat_persediaan':
 * @property integer $id_riwayat_persediaan
 * @property integer $id_bahanbaku
 * @property integer $jumlah
 * @property string $tgl_riwayat
 * @property string $created_at
 * @property string $created_by
 */
class RiwayatPersediaan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'el_riwayat_persediaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_bahanbaku, jumlah, tgl_riwayat, created_at, created_by', 'required'),
			array('id_bahanbaku, jumlah', 'numerical', 'integerOnly'=>true),
			array('created_by', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_riwayat_persediaan, id_bahanbaku, jumlah, tgl_riwayat, created_at, created_by', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_riwayat_persediaan' => 'Id Riwayat Persediaan',
			'id_bahanbaku' => 'Bahan Baku',
			'jumlah' => 'Jumlah',
			'tgl_riwayat' => 'Tgl Riwayat',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
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

		$criteria->compare('id_riwayat_persediaan',$this->id_riwayat_persediaan);
		$criteria->compare('id_bahanbaku',$this->id_bahanbaku);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('tgl_riwayat',$this->tgl_riwayat,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RiwayatPersediaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getRiwayat($bln,$thn,$id)
	{
		$criteria = new CDbCriteria;
		$criteria->select = "t.jumlah";
		$criteria->addCondition("t.id_bahanbaku = '{$id}' AND t.jumlah<0 AND MONTH(t.tgl_riwayat) = '{$bln}' AND YEAR(t.tgl_riwayat) = '{$thn}'");

		$dataRiwayat = $this->findAll($criteria);
		$sum = 0;
		foreach ($dataRiwayat as $value) {
			$sum += $value->jumlah;
		}
		return $sum;
	}
}
