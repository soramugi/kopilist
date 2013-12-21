<?php

return CMap::mergeArray(require(dirname(__FILE__).'/main.php'), array(
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host='.$_SERVER["DB1_HOST"].';port='.$_SERVER["DB1_PORT"].';dbname='.$_SERVER["DB1_NAME"],
			'emulatePrepare' => true,
			'username' => $_SERVER["DB1_USER"],
			'password' => $_SERVER["DB1_PASS"],
			'charset' => 'utf8',
		),
	),
)
);
