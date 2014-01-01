<?php

class SiteTest extends WUnitTestCase
{
	public $fixtures=array(
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

		// test login process, including validation
		$link = $crawler->selectLink('Login')->link();
		$crawler = $client->click($link);

		$this->assertTrue($crawler->filter('html:contains("Login")')->count() > 0);


		$loginTwitter=LoginTwitter::model()->findByPk(1);
		$identity=new UserIdentity($loginTwitter);
		$identity->authenticate();
		$duration=3600*24*30;
		Yii::app()->user->login($identity,$duration);
		$crawler = $client->request('GET', '/');
		$this->assertTrue($crawler->filter('html:contains("Logout")')->count() > 0);
	}
}
