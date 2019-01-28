<?php
Yii::import('application.modules.admin.models.*');

/**
 * This is the model class for table "el_peramalan".
 *
 * The followings are the available columns in table 'el_peramalan':
 * @property integer $id_peramalan
 * @property string $peramalan
 * @property double $hasil
 * @property integer $id_produk
 */
class Peramalan extends CActiveRecord
{
	public $bln_ramal;
	public $bln_data;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'el_peramalan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_produk', 'numerical', 'integerOnly'=>true),
			array('hasil', 'numerical'),
			array('peramalan', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_peramalan, peramalan, hasil, id_produk', 'safe', 'on'=>'search'),
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
			'idProduk' => array(self::BELONGS_TO, 'Produk', 'id_produk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_peramalan' => 'Id Peramalan',
			'peramalan' => 'Peramalan',
			'hasil' => 'Hasil',
			'id_produk' => 'Produk',
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

		$criteria->compare('id_peramalan',$this->id_peramalan);
		$criteria->compare('peramalan',$this->peramalan,true);
		$criteria->compare('hasil',$this->hasil);
		$criteria->compare('id_produk',$this->id_produk);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Peramalan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function monthly()
	{
		if(!$this->peramalan){
			$this->peramalan = date('m-Y');
		}

		$criteria = new CDbCriteria;

		$criteria->compare('id_peramalan',$this->id_peramalan);
		$criteria->compare('peramalan',$this->peramalan,true);
		$criteria->compare('hasil',$this->hasil);
		$criteria->compare('id_produk',$this->id_produk);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getDataPesananBulan($date,$id)
	{
		$start = $date.'-01';
	  $end = $date.'-31';
		$query = "
            SELECT SUM(psd.qty) AS sum_pesanan
            FROM el_pesanan_detail psd
            LEFT JOIN hb_pesanan psn ON psn.id_pesanan = psd.id_pesanan
            WHERE psn.tgl_pesan BETWEEN '".$start."' AND '".$end."'
            AND psd.id_produk = '{$id}'
              ";
		$command = Yii::app()->db->createCommand($query);
		$data = $command->queryRow();
		return $data['sum_pesanan'];
	}
}
