<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $model;
	private $_id;

	/**
	 * Constructor.
	 * @param CActiveRecord $model
	 */
	public function __construct(CActiveRecord $model)
	{
		$this->model=$model;
	}

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=User::model()->findByPk($this->model->user_id);
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else
		{
			$this->_id=$user->id;
			$this->username=$user->name;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->getIsAuthenticated();
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}
