<?php

class PengirimanController extends Controller
{
	public function init()
	{
		Yii::import('application.modules.admin.models.*');
  	Yii::import('application.modules.gudang.models.*');
  	Yii::import('application.modules.pemasaran.models.*');
    Yii::import('application.modules.pengadaan.models.*');
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
		$this->render('index',get_defined_vars());
	}
}
