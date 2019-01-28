<?php

class PemesananController extends Controller
{
	public function init()
	{
		Yii::import('application.modules.admin.models.*');
	}

	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Pesanan',array(
			'criteria' => array(
				'condition'=>'is_deleted = 0',
				'order'=>'created_date DESC',
			),
			'pagination' => array(
				'pageSize' =>20,
			),
		));
		$this->render('index',get_defined_vars());
	}

	public function actionCreate()
	{
		$model = new Pesanan();

		$no_order = $this->generateNoOrder();
		$pelanggan = Pelanggan::model()->findAll(array('order' => 'nama'));
    $list_pelanggan = CHtml::listData($pelanggan,'id_pelanggan', 'nama');

		$produk = Produk::model()->findAll(array('order' => 'nama'));
    $list_produk = CHtml::listData($produk,'id_produk', 'nama');

		$jenis_bayar = JenisBayar::model()->findAll(array('order'=>'keterangan'));
		$list_jenis_bayar = CHtml::listData($jenis_bayar,'id_jenis_bayar','keterangan');

		$model->no_order = $no_order;

		if(isset($_POST['Pesanan']))
		{
			$model->attributes = $_POST['Pesanan'];
			$model->id_pembayaran = $model->generatePembayaran();
			$model->created_date = date('Y-m-d h:i:s');
			if($model->save())
			{
				$data_detail = Yii::app()->session['cart'];
				foreach($data_detail as $detail){
					$p_detail = new PesananDetail();
					$p_detail->id_pesanan = $model->getPrimaryKey();
					$p_detail->id_produk = $detail["id_produk"];
					// $p_detail->no_order = $p_order;
					$p_detail->qty = $detail["qty"];
					$p_detail->created_date = date('Y-m-d h:i:s');
					$p_detail->save();
				}
				unset(Yii::app()->session['cart']);
				$this->redirect(array('index'));
			}
		}

		if(!Yii::app()->session['cart']){
			Yii::app()->session['cart'] = [];
		}
		$dt =Yii::app()->session['cart'];
		$cart = new CArrayDataProvider($dt,array(
							'keyField'=>'id'
						));
		$this->render('create',get_defined_vars());
	}

	public function actionUbah($id)
	{
		$model = Pesanan::model()->findByPk($id);
		$pelanggan = Pelanggan::model()->findAll(array('order' => 'nama'));
    $list_pelanggan = CHtml::listData($pelanggan,'id_pelanggan', 'nama');

		$produk = Produk::model()->findAll(array('order' => 'nama'));
    $list_produk = CHtml::listData($produk,'id_produk', 'nama');

		$jenis_bayar = JenisBayar::model()->findAll(array('order'=>'keterangan'));
		$list_jenis_bayar = CHtml::listData($jenis_bayar,'id_jenis_bayar','keterangan');

		if(isset($_POST['Pesanan'])){
				$model->attributes = $_POST['Pesanan'];
				// $model->id_pembayaran = $model->generatePembayaran();
				// $model->created_date = date('Y-m-d h:i:s');
				if($model->update())
				{
					$p_detail_lama = PesananDetail::model()->findAllByAttributes(['id_pesanan'=>$id]);
					if($p_detail_lama){
						foreach ($p_detail_lama as $detail_lama) {
							$detail_lama->delete();
						}
					}
					$data_detail = Yii::app()->session['cart'];
					foreach($data_detail as $detail){
						$p_detail = new PesananDetail();
						$p_detail->id_pesanan = $id;
						$p_detail->id_produk = $detail["id_produk"];
						$p_detail->qty = $detail["qty"];
						$p_detail->save();
					}
					unset(Yii::app()->session['cart']);
					$this->redirect(array('index'));
				}
		}elseif(!isset($_GET['ajax'])){
			unset(Yii::app()->session['cart']);
		}
		$data = [];
		$psd_detail = PesananDetail::model()->findAllByAttributes(['id_pesanan'=>$id,'is_deleted'=>0]);
		foreach ($psd_detail as $detail) {
			if(count($data)<1){
				$id = 1;
			}else{
				$id = count($data) +1;
			}
			$prd = Produk::model()->findByPk($detail->id_produk);
			array_push($data,['id'=>$id,'id_produk'=>$detail->id_produk,'nama'=>$prd->nama,'qty'=>$detail->qty,'harga'=>$prd->harga]);
		}
		if(!isset(Yii::app()->session['cart'])){
			Yii::app()->session['cart'] = $data;
		}
		$dt =Yii::app()->session['cart'];
		$cart = new CArrayDataProvider($dt,array(
							'keyField'=>'id'
						));
		$this->render('ubah',get_defined_vars());
	}

	public function actionHapus($id)
	{
		if($id){
			$model = Pesanan::model()->findByPk($id);
			$model->is_deleted = 1;
			$model->update();
			$this->redirect(['index']);
		}else{
			throw new Exception("ID Tidak Ditemukan", 1);
		}
	}

	public function generateNoOrder()
	{
		$lastOrder = Pesanan::model()->generateNoOrder();
		if($lastOrder){
			$arrTemp = explode('/',$lastOrder->no_order);
			$arrTemp[2] = $arrTemp[2]+1;
			$no_urut = str_pad($arrTemp[2],5,"0",STR_PAD_LEFT);
		}else{
			$no_urut = "00001";
		}
		return "PSN/".date("dmy")."/".$no_urut;
	}

	public function actionAddCart()
	{
		$id_produk = Yii::app()->request->getPost('id_produk');
		$qty = Yii::app()->request->getPost('qty');
		$data = Yii::app()->session['cart'];
		if(count($data)<1){
			$id = 1;
		}else{
			$id = count($data) +1;
		}
		$prd = Produk::model()->findByPk($id_produk);
		array_push($data,['id'=>$id,'id_produk'=>$id_produk,'nama'=>$prd->nama,'qty'=>$qty,'harga'=>$prd->harga]);
		Yii::app()->session['cart'] = $data;

	}

	public function actionRemoveCart()
	{
		$id = Yii::app()->request->getPost('id');
		$id_part = Yii::app()->request->getPost('id');
		$data = Yii::app()->session['cart'];

		unset($data[($id-1)]);
		Yii::app()->session['cart'] = $data;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pemesanan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionDetail($id)
	{
		$dataProvider = new CActiveDataProvider('PesananDetail',array(
			'criteria' => array(
				'condition'=>"id_pesanan = {$id} AND is_deleted = 0",
				'order'=>'created_date DESC',
			),
			'pagination' => array(
				'pageSize' =>20,
			),
		));
		$this->render('detail',get_defined_vars());
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
