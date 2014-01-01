<?php
class LoginTwitterTest extends CDbTestCase
{
	public $fixtures=array(
		'user'=>'User',
		'checkList'=>'CheckList',
	);

	public function test_create_LoginTwitter_and_User()
	{
		$loginTwitter = new LoginTwitter;
		$name='hugehuge';
		$loginTwitter->attributes = array(
			'tw_user_id'=>123,
			'screen_name'=>$name,
			'oauth_token'=>'test_oauth_token',
			'oauth_token_secret'=>'test_oauth_token_secret',
		);
		$loginTwitter->save();
		$this->assertInstanceOf('LoginTwitter', $loginTwitter);

		$user=User::model()->findByAttributes(
			array('name'=>$name)
		);
		$this->assertInstanceOf('User', $user);
	}

	public function test_create_LoginTwitter_only()
	{
		// user_id を指定するとUserは作られない
		$loginTwitter = new LoginTwitter;
		$name='fooovarrrrrrrr';
		$loginTwitter->attributes = array(
			'user_id'=>123,
			'tw_user_id'=>123,
			'screen_name'=>$name,
			'oauth_token'=>'test_oauth_token',
			'oauth_token_secret'=>'test_oauth_token_secret',
		);
		$loginTwitter->save();

		$user=User::model()->findByAttributes(
			array('name'=>$name)
		);
		$this->assertNull($user);
	}
}

