<?php

class SiteTest extends WUnitTestCase
{
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
}
