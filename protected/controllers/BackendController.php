<?php

class BackendController extends Controller
{
	public function actionIndex()
	{
			if (Yii::app()->user->isGuest) {
          if (isset($_GET['timeout']))
              $this->redirect(array('login', 'timeout' => 'true'));
          else if (isset($_GET['limit']))
              $this->redirect(array('login', 'limit' => 'true'));
          else
              $this->redirect(array('login'));
      }
      else {
          if (!empty(Yii::app()->user->urlRedirect))
              $this->redirect(array(Yii::app()->user->urlRedirect));
          else
              $this->redirect(array('/site/index'));
      }
	}

	public function actionLogin()
	{
			if (!Yii::app()->user->isGuest) {
          if (isset(Yii::app()->user->urlRedirect))
              $this->redirect(array(Yii::app()->user->urlRedirect));
          else
              $this->redirect(array('/site/index'));
      }

      $model = new LoginFormHarapanBaru;
      $post = Yii::app()->request->getPost(get_class($model));
      if (!empty($post)) {
          $model->attributes = $post;
          if ($model->validate() && $model->login()) {
              if (!empty(Yii::app()->user->urlRedirect))
                  $this->redirect(array(Yii::app()->user->urlRedirect));
              else
                  $this->redirect(array('/site/index'));
          }
      }

      $this->layout = '//layouts/login';
      $this->render('login_ace', array('model' => $model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionForgot()
	{
		$model = new ForgotForm;
		// $this-
		$this->layout = '//layouts/login';
		$this->render('forgot');
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
