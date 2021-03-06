<?php

$_SERVER["CONSUMER_KEY"]    = 'hugehuge';
$_SERVER["CONSUMER_SECRET"] = 'hugehuge';
$_SERVER["HTTPS"]           = 'http://';
$_SERVER["HTTP_HOST"]       = 'localhost';

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'import' => array(
			'ext.wunit.*',
		),
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			'wunit' => array(
				'class' => 'WUnit'
			),
			/* uncomment the following to provide test database connection
			'db'=>array(
				'connectionString'=>'DSN for test database',
			),
			 */
			),
		)
	);
