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
		$model=new CheckList;
		$models=CheckList::model()->findAllByAttributes(
			array('user_id'=>Yii::app()->user->id)
		);
		$this->render('index',array('model'=>$model,'models'=>$models));
	}

	public function actionAdd()
	{
		$model=new CheckList;

		// uncomment the following code to enable ajax-based validation
	/*
	if(isset($_POST['ajax']) && $_POST['ajax']==='check-list-add-form')
	{
		echo CActiveForm::validate($model);
		Yii::app()->end();
	}
	 */

		if(isset($_POST['CheckList']))
		{
			$model->attributes=$_POST['CheckList'];
			if($model->validate())
			{
				$model->save();
			}
		}
		$this->forward('index');
	}
}
