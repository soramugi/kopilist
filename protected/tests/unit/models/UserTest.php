<?php
class UserTest extends CDbTestCase
{
	public $fixtures=array(
		'user'=>'User',
	);

	public function testFind()
	{
		$user=User::model()->find(
			'name=:name',
			array(':name'=>$this->user[1]['name'])
		);
		$this->assertInstanceOf('User', $user);
	}
}
