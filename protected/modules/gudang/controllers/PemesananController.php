<?php
Yii::import('application.modules.pemasaran.models.*');
Yii::import('application.modules.admin.models.*');

class PemesananController extends Controller
{
	public function actionMonitoring()
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
		$this->render('monitoring',get_defined_vars());
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
