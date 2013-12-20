<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../vendor/yiisoft/yii/framework/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);

require(dirname(__FILE__) . '/../extensions/wunit/WUnit.php');
WUnit::createWebApplication($config);
