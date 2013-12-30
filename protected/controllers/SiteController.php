<?php

class SiteController extends Controller
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
			array(
				'deny',
				'users'=>array('@'),
				'actions'=>array('login','twitterLogin','twitterCallback'),
			),
		);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');

	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->render('login');
	}

	public function actionTwitterLogin()
	{
		//grab twitter object and request token
		$twitter = Yii::app()->twitter->getTwitter();
		$request_token = $twitter->getRequestToken(
			Yii::app()->twitter->getCallback()
		);
		if(!isset($_SESSION))
			session_start();
		//set some session info
		$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
		$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

		if($twitter->http_code == 200){
			//get twitter connect url
			$url = $twitter->getAuthorizeURL($token);
			//send them
			$this->redirect($url);
		}else{
			//error here
			$this->redirect(Yii::app()->homeUrl);
		}
	}

	public function actionTwitterCallBack()
	{
		if(!isset($_SESSION))
			session_start();
		if (
			isset($_REQUEST['oauth_token'])
			&& $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']
		) {
			$this->redirect(Yii::app()->homeUrl);
		}

		$twitter = Yii::app()->twitter->getTwitterTokened(
			$_SESSION['oauth_token'], $_SESSION['oauth_token_secret']
		);

		$access_token = $twitter->getAccessToken($_REQUEST['oauth_verifier']);

		$_SESSION['access_token'] = $access_token;

		unset($_SESSION['oauth_token']);
		unset($_SESSION['oauth_token_secret']);

		if($twitter->http_code == 200){
			$loginTwitter=LoginTwitter::model()->findByAttributes(
				array('tw_user_id'=>$access_token['user_id'])
			);
			if($loginTwitter===null){
				$access_token['tw_user_id'] = $access_token['user_id'];
				unset($access_token['user_id']);
				$loginTwitter = new LoginTwitter;
				$loginTwitter->attributes=$access_token;
				if(!$loginTwitter->save())
					throw new CHttpException(
						401,json_encode($loginTwitter->getErrors())
					);
			}
			$identity=new UserIdentity($loginTwitter);
			if($identity->authenticate()){
				$duration=3600*24*30;
				Yii::app()->user->login($identity,$duration);
			}else{
				throw new CHttpException(
					401,'Unauthorized. Please do not repeat this request again.'
				);
			}
		}

		$this->redirect('/list/index');
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
