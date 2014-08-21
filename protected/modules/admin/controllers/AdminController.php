<?php

class adminController extends Controller
{
	public $layout='/layouts/admin';
	public function actionIndex()
	{	if(Yii::app()->user->id && Yii::app()->user->userType=='Administrator'){
		$this->render('index');
		die;
		}
		$this->redirect(array('/site/error'));
	}
}