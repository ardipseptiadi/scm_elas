<?php

class PengirimanController extends Controller
{
	public function init()
	{
		Yii::import('application.modules.admin.models.*');
		Yii::import('application.modules.gudang.models.*');
	}

	public function actionIndex()
	{
		$providerPesanan = new CActiveDataProvider('Pesanan',array(
			'pagination' => array(
				'pageSize' =>20,
			),
		));
		$providerKiriman = new CActiveDataProvider('Pengiriman',array(
			'pagination' => array(
				'pageSize' =>20,
			),
		));
		$this->render('index',get_defined_vars());
	}

	public function actionMonitoring()
	{
		$providerPesanan = new CActiveDataProvider('Pesanan',array(
			'pagination' => array(
				'pageSize' =>20,
			),
		));
		$providerKiriman = new CActiveDataProvider('Pengiriman',array(
			'pagination' => array(
				'pageSize' =>20,
			),
		));
		$this->render('monitoring',get_defined_vars());
	}

	public function actionGetDataPesanan($id)
	{
		$pesanan = Pesanan::model()->findByPk($id);
		// echo "helo";
		// $this->renderPartial('_form_kirim',get_defined_vars());
		echo CJSON::encode([
									'responseText'=>'berhasil',
									'status'=>true,
									'pesanan'=>[
													'no_order'=> $pesanan->no_order,
													'tgl_pesan' => $pesanan->tgl_pesan,
													'tgl_kirim' => $pesanan->tgl_kirim
												],
									'pengiriman'=>[
													'no_pengiriman' => $this->generateNoPengiriman()
												],
									]);
	}

	public function actionGetFormPengiriman($id)
	{
		$mPesanan = Pesanan::model()->findByPk($id);
		if(isset($_POST) && count($_POST)){
			$mKiriman = new Pengiriman;
			$mKiriman->tgl_kirim = $mPesanan->tgl_kirim;
			$mKiriman->no_pengiriman = isset($_POST['no_kirim']) ?$_POST['no_kirim']:null;
			$mKiriman->id_pesanan = $id;
			$mKiriman->id_kendaraan = isset($_POST['listkendaraan'])?$_POST['listkendaraan']:null;
			$mKiriman->tujuan = isset($_POST['tujuan']) ?$_POST['tujuan']:null;
			$mKiriman->created_at = date('Y-m-d h:i:s');
			$mKiriman->save();

			$mPesanan->is_verifikasi = 2;
			$mPesanan->update();
			$this->redirect(['index']);
		}
		$no_pesanan = $mPesanan->no_order;
		$no_kiriman = $this->generateNoPengiriman();

		$kendaraan = KendaraanPerusahaan::model()->findAll(array('order' => 'no_polisi'));
    $list_kendaraan = CHtml::listData($kendaraan,'id_kendaraan', 'no_polisi');

		Yii::app()->clientscript->scriptMap['jquery.js'] = false;
		$this->renderPartial('_form_kirim',get_defined_vars(),false,true);
	}

	public function generateNoPengiriman()
	{
		$lastKiriman = Pengiriman::model()->generateNoPengiriman();
		if($lastKiriman){
			$arrTemp = explode('/',$lastKiriman->no_pengiriman);
			$arrTemp[2] = $arrTemp[2]+1;
			$no_urut = str_pad($arrTemp[2],5,"0",STR_PAD_LEFT);
		}else{
			$no_urut = "00001";
		}
		return "KRM/".date("dmy")."/".$no_urut;
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
