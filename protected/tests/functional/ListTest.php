<?php

class ListTest extends WUnitTestCase
{
	public $fixtures=array(
		'user'=>'User',
		'checkList'=>'CheckList',
	);

	public function testIndex()
	{
		// login処理
		$user=$this->user[1];
		$loginTwitter=LoginTwitter::model()->findByAttributes(
			array('user_id'=>$user['id'])
		);
		$identity=new UserIdentity($loginTwitter);
		$identity->authenticate();
		$duration=3600*24*30;
		Yii::app()->user->login($identity,$duration);

		$client = static::createClient();
		$crawler = $client->request('GET', '/list/index');

		$checkList=array();
		foreach($this->checkList as $_checkList){
			if($_checkList['user_id']==$user['id'] && $_checkList['check']==0)
				$checkList[]=$_checkList;
		}

		$this->assertTrue(
			$crawler->filter("html:contains('{$checkList[0]['text']}')")->count() > 0
		);
	}

	public function testIndex_add()
	{
		// login処理
		$user=$this->user[1];
		$loginTwitter=LoginTwitter::model()->findByAttributes(
			array('user_id'=>$user['id'])
		);
		$identity=new UserIdentity($loginTwitter);
		$identity->authenticate();
		$duration=3600*24*30;
		Yii::app()->user->login($identity,$duration);

		$client = static::createClient();
		$crawler = $client->request('GET', '/list/index');

		$text='demodemo test';
		$form = $crawler->selectButton('Submit')->form();
		$form['CheckList[text]'] = $text;
		$crawler=$client->submit($form);

		$this->assertTrue(
			$crawler->filter("html:contains('{$text}')")->count() > 0
		);
	}
}
