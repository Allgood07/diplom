<?php
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

defined('YII_CONSOLE') or define('YII_CONSOLE',true);
ini_set('memory_limit', '-1');


// change the following paths if necessary
$yii=dirname(__FILE__).'/../vendor/yiisoft/yii/framework/yii.php';
require_once($yii);

$config= require(dirname(__FILE__).'/config/main.php');




$app = Yii::createConsoleApplication($config);

$app->run();