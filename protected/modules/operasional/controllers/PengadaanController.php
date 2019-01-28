<?php

class PengadaanController extends Controller
{
	public function init()
	{
		Yii::import('application.modules.admin.models.*');
  	Yii::import('application.modules.pemasaran.models.*');
    Yii::import('application.modules.pengadaan.models.*');
	}

	public function actionVerifikasi()
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

  public function actionAct($id)
	{
		$pengadaan = Pengadaan::model()->findByPk($id);
		$pengadaan->is_verifikasi = 1;
		if($pengadaan->update()){
			echo "Sukses";
		}else {
			echo "Terjadi Kesalahan";
		}
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
