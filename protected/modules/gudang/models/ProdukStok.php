<?php
Yii::import('application.modules.admin.models.*');
/**
 * This is the model class for table "el_produk_stock".
 *
 * The followings are the available columns in table 'el_produk_stock':
 * @property integer $id_produk
 * @property integer $qty_in_hand
 * @property string $last_update
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property Produk $idProduk
 */
class ProdukStok extends CActiveRecord
{
	public $part_name;
	public $added_qty;
	public $qty_add;
	public $bulan_safety;
	public $tahun_safety;
	public $date_safety;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'el_produk_stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_produk, qty_in_hand, last_update, updated_by', 'required'),
			array('id_produk, qty_in_hand', 'numerical', 'integerOnly'=>true),
			array('updated_by', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_produk, qty_in_hand, last_update, updated_by,bulan_safety,tahun_safety,date_safety', 'safe', 'on'=>'search'),
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
			'id_produk' => 'Produk ID',
			'qty_in_hand' => 'Qty In Hand',
			'last_update' => 'Last Update',
			'updated_by' => 'Updated By',
			'added_qty' => 'Jumlah yang ditambahkan'
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

		$criteria->compare('id_produk',$this->id_produk);
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
	 * @return ProdukStok the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function safety_stock()
	{
		$bln = date('m');
		$thn = date('Y');
		if(isset($_GET['ProdukStok']))
		{
			$this->date_safety = $_GET['ProdukStok']['date_safety'];
			$dates = $this->date_safety;
			$dates = explode('-',$dates);
			$bln = $dates[0];
			$thn = $dates[1];
		}
		$id = $this->id_produk;
		$jumlah = 0;
		$mSafety = ProdukSafety::model()->findByAttributes(['bulan'=>ltrim($bln,'0'),'tahun'=>$thn,'id_produk'=>$id]);
		if(!$mSafety){
			$res = ProdukSafety::model()->updateSafety($bln,$thn,$id);
			if(!$res){
				$jumlah = 0;
			}else{
				$jumlah = $res;
			}
		}else{
			$jumlah = $mSafety->jumlah;
		}
		return $jumlah;
	}

	public function status()
	{
		if($this->qty_in_hand > $this->safety_stock()){
			return 'Aman';
		}else{
			return 'Tidak Aman';
		}
	}

	public function beforeSave()
	{
	   if(parent::beforeSave())
	   {
			 if($this->isNewRecord){
	        $mRiwayat = new RiwayatPersediaan;
					$mRiwayat->id_produk = $this->id_produk;
					$mRiwayat->jumlah = $this->qty_add;
					$mRiwayat->tgl_riwayat = date('Y-m-d');
					$mRiwayat->created_at = date('Y-m-d h:i:s');
					$mRiwayat->created_by = 'gudang';
					if($mRiwayat->save()){
						return true;
					}else{
						var_dump($mRiwayat->getErrors());exit;
						return false;
					}
				}else{
					return true;
				}
	   }
	   return false;
	}
}
