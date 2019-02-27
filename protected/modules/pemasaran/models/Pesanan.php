<?php

/**
 * This is the model class for table "hb_pesanan".
 *
 * The followings are the available columns in table 'hb_pesanan':
 * @property integer $id_pesanan
 * @property integer $id_pelanggan
 * @property string $no_order
 * @property integer $id_pembayaran
 * @property string $tgl_pesan
 * @property string $tgl_kirim
 * @property integer $status_bayar
 * @property string $created_date
 * @property integer $is_deleted
 *
 * The followings are the available model relations:
 * @property Pelanggan $idPelanggan
 * @property Pembayaran $idPembayaran
 */
class Pesanan extends CActiveRecord
{
	public $id_jenis_bayar;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'el_pesanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pelanggan, id_pembayaran, created_date', 'required'),
			array('id_pelanggan, id_pembayaran, status_bayar,is_verifikasi, is_deleted', 'numerical', 'integerOnly'=>true),
			array('no_order', 'length', 'max'=>25),
			array('tgl_pesan, tgl_kirim,is_verifikasi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pesanan, id_pelanggan, no_order, id_pembayaran, tgl_pesan, tgl_kirim, status_bayar,is_verifikasi, created_date, is_deleted', 'safe', 'on'=>'search'),
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
			'idPelanggan' => array(self::BELONGS_TO, 'Pelanggan', 'id_pelanggan'),
			'idPembayaran' => array(self::BELONGS_TO, 'Pembayaran', 'id_pembayaran'),
			'idPesanDetail' => array(self::HAS_MANY, 'PesananDetail', 'id_pesanan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pesanan' => 'Id Pesanan',
			'id_pelanggan' => 'Pelanggan',
			'no_order' => 'No Order',
			'id_pembayaran' => 'Id Pembayaran',
			'tgl_pesan' => 'Tgl Pesan',
			'tgl_kirim' => 'Tgl Kirim',
			'status_bayar' => 'Status Bayar',
			'is_verifikasi' => 'Verifikasi',
			'created_date' => 'Created Date',
			'is_deleted' => 'Is Deleted',
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

		$criteria->compare('id_pesanan',$this->id_pesanan);
		$criteria->compare('id_pelanggan',$this->id_pelanggan);
		$criteria->compare('no_order',$this->no_order,true);
		$criteria->compare('id_pembayaran',$this->id_pembayaran);
		$criteria->compare('tgl_pesan',$this->tgl_pesan,true);
		$criteria->compare('tgl_kirim',$this->tgl_kirim,true);
		$criteria->compare('status_bayar',$this->status_bayar);
		$criteria->compare('is_verifikasi',$this->is_verifikasi);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('is_deleted',$this->is_deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pesanan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function generateNoOrder()
	{
		$criteria = new CDbCriteria();
		$criteria->select= "t.no_order";
		$criteria->condition= "t.no_order IS NOT NULL AND t.no_order != ''";
		$criteria->order = "t.id_pesanan DESC";
		$criteria->limit="1";

		return $this->find($criteria);
	}

	public function generatePembayaran()
	{
		$pembayaran = new Pembayaran;
		$pembayaran->jenis_pembayaran = 'Tunai';
		$pembayaran->jumlah = 0;
		if($pembayaran->save())
		return $pembayaran->getPrimaryKey();
	}
}
