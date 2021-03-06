<?php

class PengadaanController extends Controller
{
	public function init()
	{
		Yii::import('application.modules.admin.models.*');
	}

	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Pengadaan',array(
			'criteria' => array(
				'condition'=>'is_deleted = 0',
				'order'=>'created_at DESC',
			),
			'pagination' => array(
				'pageSize' =>20,
			),
		));
		$this->render('index',get_defined_vars());
	}

	public function actionTambah()
	{
		$model = new Pengadaan;
		$model->no_pengadaan = $this->generateNoPengadaan();
		// $part = Part::model()->findAll(array('order' => 'nama_part'));
    // $list_part = CHtml::listData($part,'id_part', 'nama_part');
		$bahanbaku = BahanBaku::model()->findAll(array('order' => 'nama'));
		$list_bahanbaku = CHtml::listData($bahanbaku,'id_bahanbaku', 'nama');

		if(isset($_POST['Pengadaan']))
		{
			$model->attributes = $_POST['Pengadaan'];
			$model->no_pengadaan = $this->generateNoPengadaan();
			$model->created_at = date('Y-m-d h:i:s');
			if($model->save())
			{
				$data_detail = Yii::app()->session['cart'];
				foreach($data_detail as $detail){
					$p_detail = new PengadaanDetail();
					$p_detail->id_pengadaan = $model->getPrimaryKey();
					$p_detail->id_bahanbaku = $detail["id_bahanbaku"];
					$p_detail->id_supplier_bahanbaku = (int) $detail['id_supplier_bahanbaku'];
					$p_detail->qty_pengadaan = $detail["qty"];
					$p_detail->created_at = date('Y-m-d h:i:s');
					if(!$p_detail->save()){
						var_dump($p_detail->getErrors());exit;
					}
				}
				unset(Yii::app()->session['cart']);
				$this->redirect(array('index'));
			}else{
				var_dump($model->getErrors());exit;
			}
		}
		if(!Yii::app()->session['cart']){
			Yii::app()->session['cart'] = [];
		}
		$dt =Yii::app()->session['cart'];
		$cart = new CArrayDataProvider($dt,array(
							'keyField'=>'id'
						));
		$this->render('tambah',get_defined_vars());
	}

	public function actionUbah($id)
	{
		$model = Pengadaan::model()->findByPk($id);
		$bahanbaku = BahanBaku::model()->findAll(array('order' => 'nama'));
    $list_bahanbaku = CHtml::listData($bahanbaku,'id_bahanbaku', 'nama');

		if(isset($_POST['Pengadaan'])){
				$model->attributes = $_POST['Pengadaan'];
				// $model->id_pembayaran = $model->generatePembayaran();
				// $model->created_date = date('Y-m-d h:i:s');
				if($model->update())
				{
					$p_detail_lama = PengadaanDetail::model()->findAllByAttributes(['id_pengadaan'=>$id]);
					if($p_detail_lama){
						foreach ($p_detail_lama as $detail_lama) {
							$detail_lama->delete();
						}
					}
					$data_detail = Yii::app()->session['cart'];
					foreach($data_detail as $detail){
						$p_detail = new PengadaanDetail();
						$p_detail->id_pengadaan = $id;
						$p_detail->id_bahanbaku = $detail["id_bahanbaku"];
						$p_detail->id_supplier_bahanbaku = $detail['id_supplier_bahanbaku'];
						$p_detail->qty_pengadaan = $detail["qty"];
						$p_detail->created_at = date('Y-m-d h:i:s');
						if(!$p_detail->save()){
							var_dump($p_detail->getErrors());exit;
						}
					}
					unset(Yii::app()->session['cart']);
					$this->redirect(array('index'));
				}
		}elseif(!isset($_GET['ajax'])){
			unset(Yii::app()->session['cart']);
		}
		$data = [];
		$psd_detail = PengadaanDetail::model()->findAllByAttributes(['id_pengadaan'=>$id,'is_deleted'=>0]);
		foreach ($psd_detail as $detail) {
			if(count($data)<1){
				$id = 1;
			}else{
				$id = count($data) +1;
			}
			$prd = BahanBaku::model()->findByPk($detail->id_bahanbaku);
			$mSupp = SupplierBahanBaku::model()->findByPk($detail->id_supplier_bahanbaku);
			$supplier = '';
			if($mSupp){
				$supplier = $mSupp->idSupplier->nama;
			}
			array_push($data,['id'=>$id,'id_bahanbaku'=>$detail->id_bahanbaku,'nama'=>$prd->nama,'qty'=>$detail->qty_pengadaan,'harga'=>$prd->harga,'id_supplier_bahanbaku'=>$detail->id_supplier_bahanbaku,'supplier'=>$supplier]);
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

	public function generateNoPengadaan()
	{
		$lastOrder = Pengadaan::model()->generateNoPengadaan();
		if($lastOrder){
			$arrTemp = explode('/',$lastOrder->no_pengadaan);
			$arrTemp[2] = $arrTemp[2]+1;
			$no_urut = str_pad($arrTemp[2],5,"0",STR_PAD_LEFT);
		}else{
			$no_urut = "00001";
		}
		return "PGD/".date("dmy")."/".$no_urut;
	}

	public function actionAddCart()
	{
		$id_bahanbaku = Yii::app()->request->getPost('id_bahanbaku');
		$qty = Yii::app()->request->getPost('qty');
		$id_supp = Yii::app()->request->getPost('supp');
		$mSupp = SupplierBahanBaku::model()->findByPk($id_supp);
		$supplier = '';
		if($mSupp){
			$supplier = $mSupp->idSupplier->nama;
		}
		$data = Yii::app()->session['cart'];
		foreach ($data as $item) {
			if($item["id_bahanbaku"] == $id_bahanbaku){
				echo CJSON::encode(['responseText'=>'bahan baku telah dipilih','status'=>false]);
				return false;exit;
			}
		}
		if(count($data)<1){
			$id = 1;
		}else{
			$id = count($data) +1;
		}
		$prd = BahanBaku::model()->findByPk($id_bahanbaku);
		$supp_prd = SupplierBahanBaku::model()->findAllByAttributes(['id_bahanbaku'=>$id_bahanbaku]);
		$list_supp =  CJSON::encode(CHtml::listData($supp_prd,'id_supplier_bahanbaku','idSupplier.nama'));
		array_push($data,['id'=>$id,'id_bahanbaku'=>$id_bahanbaku,'nama'=>$prd->nama,'qty'=>$qty,'harga'=>$prd->harga,'id_supplier_bahanbaku'=>$id_supp,'supplier'=>$supplier]);
		Yii::app()->session['cart'] = $data;
		echo CJSON::encode(['responseText'=>'berhasil','status'=>true]);
	}

	public function actionRemoveCart()
	{
		$id = Yii::app()->request->getPost('id');
		$id_bahanbaku = Yii::app()->request->getPost('id_bahanbaku');
		$data = Yii::app()->session['cart'];
		unset($data[($id-1)]);
		Yii::app()->session['cart'] = $data;
	}

	public function actionGetPeramalan()
	{
		$id_bahanbaku = $_POST['id_bahanbaku'];
		$criteria = new CDbCriteria;
		$criteria->condition = "id_bahanbaku = '$id_bahanbaku' ";
		$criteria->order = "peramalan";
		// $peramalan = Peramalan::model()->findByAttributes(['id_part'=>$id_part]);
		$peramalan = Peramalan::model()->find($criteria);
		if($peramalan){
			echo CJSON::encode(['responseText'=>'berhasil','status'=>true,'hasil'=>$peramalan->hasil]);
		}else{
			echo CJSON::encode(['responseText'=>'gagal','status'=>false,'hasil'=>'-']);
		}
	}

	public function actionDetail($id)
	{
		$dataProvider = new CActiveDataProvider('PengadaanDetail',array(
			'criteria' => array(
				'condition'=>"id_pengadaan = {$id} AND is_deleted = 0",
				'order'=>'created_at DESC',
			),
			'pagination' => array(
				'pageSize' =>20,
			),
		));
		$this->render('detail',get_defined_vars());
	}

	public function actionHapus($id)
	{
		if($id){
			$model = Pengadaan::model()->findByPk($id);
			$model->is_deleted = 1;
			$model->update();
			$this->redirect(['index']);
		}else{
			throw new Exception("ID Tidak Ditemukan", 1);
		}
	}

	public function actionGetSupplier()
	{
		$id_bahanbaku = Yii::app()->request->getPost('id_bahanbaku');
		$mSupp = SupplierBahanBaku::model()->findAllByAttributes(['id_bahanbaku'=>$id_bahanbaku]);

		// $data=SupplierPart::model()->findAll('id_bahanbaku=:id_bahanbaku',
   // array(':id_bahanbaku'=>(int) $_POST['id_bahanbaku']));
		$data = CHtml::listData($mSupp,'id_supplier_bahanbaku','idSupplier.nama');

		if(count($data)>0){
			echo "<option value=''>(Pilih Supplier)</option>";
		}else{
			echo "<option value=''>(Tidak ada supplier)</option>";
		}
   	foreach($data as $value=>$nama_supplier)
   		echo CHtml::tag('option', array('value'=>$value),CHtml::encode($nama_supplier),true);
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
