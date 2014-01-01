<?php

class UserController extends Controller
{
	public function actionView($id)
	{
		$user=User::model()->findByPk($id);

		if($user===null)
			throw new CHttpException(403,'Forbidden. User does not exist.');

		$this->render('view', array('user'=>$user));
	}
}
