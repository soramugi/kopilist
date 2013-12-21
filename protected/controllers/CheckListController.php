<?php

class CheckListController extends Controller
{
	// Uncomment the following methods and override them if needed
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/*
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions
			'users'=>array('@'),
		),
		#array('deny',  // deny all users
		#	'users'=>array('*'),
		#),
	);
	}

	public function actionIndex()
	{
		$models=CheckList::model()->findAll(
			'user_id=:user_id',
			array(
				':user_id'=>1,
			));
		$this->render('index',array(
			'models'=>$models
		));
	}
}
