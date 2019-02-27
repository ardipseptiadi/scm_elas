<?php

/**
 * This is the model class for table "hb_pengadaan".
 *
 * The followings are the available columns in table 'hb_pengadaan':
 * @property integer $id_pengadaan
 * @property string $no_pengadaan
 * @property string $tgl_pengadaan
 * @property integer $id_part
 * @property integer $jumlah
 * @property integer $total_harga
 * @property integer $is_verifikasi
 * @property integer $status
 * @property string $created_at
 */
class Pengadaan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'el_pengadaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tgl_pengadaan', 'required'),
			array('jumlah, total_harga, is_verifikasi, status', 'numerical', 'integerOnly'=>true),
			array('no_pengadaan', 'length', 'max'=>30),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pengadaan, no_pengadaan, tgl_pengadaan, id_bahanbaku, jumlah, total_harga, is_verifikasi, status, created_at', 'safe', 'on'=>'search'),
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
			'id_pengadaan' => 'Id Pengadaan',
			'no_pengadaan' => 'No Pengadaan',
			'tgl_pengadaan' => 'Tgl Pengadaan',
			'jumlah' => 'Jumlah',
			'total_harga' => 'Total Harga',
			'is_verifikasi' => 'Is Verifikasi',
			'status' => 'Status',
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

		$criteria->compare('id_pengadaan',$this->id_pengadaan);
		$criteria->compare('no_pengadaan',$this->no_pengadaan,true);
		$criteria->compare('tgl_pengadaan',$this->tgl_pengadaan,true);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('total_harga',$this->total_harga);
		$criteria->compare('is_verifikasi',$this->is_verifikasi);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pengadaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function generateNoPengadaan()
	{
		$criteria = new CDbCriteria();
		$criteria->select= "t.no_pengadaan";
		$criteria->condition= "t.no_pengadaan IS NOT NULL AND t.no_pengadaan != ''";
		$criteria->order = "t.created_at DESC";
		$criteria->limit="1";

		return $this->find($criteria);

	}
}
