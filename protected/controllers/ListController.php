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
			array(
				'user_id'=>Yii::app()->user->id,
				'check'=>0
			)
		);
		$this->render('index',array('model'=>$model,'models'=>$models));
	}

	public function actionAdd()
	{
		if(isset($_POST['CheckList']))
		{
			$model=new CheckList;
			$model->attributes=$_POST['CheckList'];
			if($model->validate())
				$model->save();
		}
		$this->forward('index');
	}

	public function actionCheck()
	{
		if(isset($_POST['pk']))
		{
			$model=CheckList::model()->findByAttributes(
				array(
					'id'=>$_POST['pk'],
					'user_id'=>Yii::app()->user->id,
				)
			);
			if($model!==null){
				$model->check=($model->check==1)?0:1;
				if($model->save())
					echo 'success!';
			}
		}
		echo json_encode($_POST);
	}
}
