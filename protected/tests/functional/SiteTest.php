<?php

class SiteTest extends WUnitTestCase
{
	public $fixtures=array(
		'user'=>'User',
		'checkList'=>'CheckList',
	);

	public function testIndex()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', '/site/index');

		$this->assertTrue($crawler->filter('html:contains("Welcome")')->count() > 0);
	}

	public function testLoginLogout()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', '/');

		#// ensure the user is logged out
		#if($this->isTextPresent('Logout'))
		#	$this->clickAndWait('link=Logout (demo)');

		// test login process, including validation
		$link = $crawler->selectLink('Login')->link();
		$crawler = $client->click($link);

		$this->assertTrue($crawler->filter('html:contains("Login")')->count() > 0);
	}

	public function testUser()
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

	public function testForbiddenUser()
	{
		$this->setExpectedException('CHttpException');
		$client = static::createClient();
		$crawler = $client->request('GET', '/user/1000000');
	}
}
