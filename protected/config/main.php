<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Kopi List',
	'defaultController' => 'site',
	'sourceLanguage'=>'ja',
	'language'=>'ja_JP',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'kogaidan',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'twitter' => array(
			'class' => 'YiiTwitter',
			'consumer_key' => $_SERVER["CONSUMER_KEY"],
			'consumer_secret' => $_SERVER["CONSUMER_SECRET"],
			'callback' => (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . '/site/twitterCallBack',
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				''=>'site/index',
				'login'=>'site/login',
				'user/<id:\d+>'=>'user/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			'showScriptName'=>false
		),
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
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				 */
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
