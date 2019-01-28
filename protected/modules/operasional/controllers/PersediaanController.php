<?php

class PersediaanController extends Controller
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
		$model = new ProdukStok('search');
		$model->date_safety = date('m-Y');
		if(isset($_GET['ProdukStok']))
		{
			$model->date_safety = $_GET['ProdukStok']['date_safety'];
			$dates = $model->date_safety;
			$dates = explode('-',$dates);
			$model->bulan_safety = $dates[0];
			$model->tahun_safety = $dates[1];
		}
		$dataProvider = new CActiveDataProvider($model,array(
			'pagination' => array(
				'pageSize' =>20,
			),
		));
		$this->render('index',get_defined_vars());
	}
}
