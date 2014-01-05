<?php

class ListTest extends WUnitTestCase
{
	public $fixtures=array(
		'user'=>'User',
		'checkList'=>'CheckList',
	);

	public function login()
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
		return $user;
	}

	public function testIndex()
	{
		$user=$this->login();

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
		$user=$this->login();

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

	public function testCheck()
	{
		$user=$this->login();

		// 自分のチェックリストでチェックされていないもの
		$checkList=array();
		foreach($this->checkList as $k => $_checkList){
			if($_checkList['user_id']==$user['id'] && $_checkList['check']==0){
				$_checkList['id']=$k;
				$checkList[]=$_checkList;
			}
		}

		$client = static::createClient();
		$crawler = $client->request(
			'POST',
			'/list/check',
			array('pk'=>$checkList[0]['id'])
		);

		$this->assertTrue(
			$crawler->filter('html:contains("success!")')->count() > 0
		);
	}

	public function testCopy()
	{
		$user=$this->login();

		// 自分のチェックリスト以外
		$checkList=array();
		foreach($this->checkList as $k => $_checkList){
			if($_checkList['user_id']!=$user['id']){
				$_checkList['id']=$k;
				$checkList[]=$_checkList;
			}
		}

		$client = static::createClient();
		$crawler = $client->request(
			'POST',
			'/list/copy',
			array('pk'=>$checkList[0]['id'])
		);

		$this->assertTrue(
			$crawler->filter('html:contains("success!")')->count() > 0
		);
	}
}
