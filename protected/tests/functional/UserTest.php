<?php

class User_Test extends WUnitTestCase
{
	public $fixtures=array(
		'user'=>'User',
		'checkList'=>'CheckList',
	);

	public function testView()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', '/user/1');

		$user = $this->user[1];
		$checkList = $this->checkList[1];
		$this->assertTrue(
			$crawler->filter("html:contains('{$user['name']}')")->count() > 0
		);
		$this->assertTrue(
			$crawler->filter("html:contains('{$checkList['text']}')")->count() > 0
		);

	}

	public function testViewForbidden()
	{
		$this->setExpectedException('CHttpException');
		$client = static::createClient();
		$crawler = $client->request('GET', '/user/1000000');
	}
}
