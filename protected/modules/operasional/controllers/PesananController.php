<?php

class PesananController extends Controller
{
	public function init()
	{
		Yii::import('application.modules.admin.models.*');
    Yii::import('application.modules.pemasaran.models.*');
	}

	public function actionVerifikasi()
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

	public function actionAct($id)
	{
		$pesanan = Pesanan::model()->findByPk($id);
		$pesanan->is_verifikasi = 1;
		if($pesanan->update()){
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
