<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(
		'db'=>(isset($_SERVER["PLATFORM"]) && $_SERVER["PLATFORM"]=="PAGODABOX")?
		// Pagoda config
		array(
			'connectionString' => 'mysql:host='.$_SERVER["DB1_HOST"].';port='.$_SERVER["DB1_PORT"].';dbname='.$_SERVER["DB1_NAME"],
			'emulatePrepare' => true,
			'username' => $_SERVER["DB1_USER"],
			'password' => $_SERVER["DB1_PASS"],
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		):
		// Local config
		array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/kopilist.db',
			'tablePrefix' => 'tbl_',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		 */
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);
