<?php
// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
require_once($yii);
/**
 * add by dayunlong
 */
defined('DS') or define('DS','/');
define('APP_PATH',dirname(__FILE__));
$HOST=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].($_SERVER['SERVER_PORT']=='80'?'':$_SERVER['SERVER_PORT']);
$HTTP_RESOURCES=$HOST.DS.'resources';//不带最后的 /
define('APP_HOST',$HOST); //当前访问 根url
define('HTTP_RESOURCES',$HTTP_RESOURCES);//当前素材的存放路径

Yii::createWebApplication($config)->run();