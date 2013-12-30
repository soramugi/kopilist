<?php

class ListController extends Controller
{
	// Uncomment the following methods and override them if needed
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', 'users'=>array('@')),
			array('deny', 'users'=>array('*')),
		);
	}

	public function actionIndex()
	{
		$models=LoginTwitter::model()->findByAttributes(
			array('user_id'=>Yii::app()->user->id)
		);
		$this->render('index',array('models'=>$models));
	}
}
