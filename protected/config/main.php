<?php

// This is the main Web application configuration. Any writable
// application properties can be configured here.
$config = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii::HCKP',
	'defaultController' =>'dcenter',
	// autoloading model and component classes
	'import'=>array(		
		'application.models.*',
		'application.components.*',
		'application.components.Utils.*',
	),
	'modules'=>array(
		'plat',
		'driver',
	),
	// application components
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' =>'mysql:host=127.0.0.1;dbname=test;port=3306',
			'username' => 'root',
			'password' => 'e1f4f1dab7',
			'charset' => 'utf8',
		),
		//memcache配置
//		'mcache' => array(
//				'class' => 'CMemCache',
//				'servers' => array(
//						array('host' => '127.0.0.1', 'port' => 11211),
//				),
//				'keyPrefix'=>'laravel',
//				'hashKey' => false,
//				'serializer' => false
//
//		),
		//session配置
//		'session' => array (
//				'class'=> 'CCacheHttpSession',
//				'cacheID' => 'mcache',
//				'cookieMode' => 'only',
//				'timeout' => 1200,
//		),
	),
	'params'=>array(
		'api_config'=>require_once 'api/api_config.php',		
	),
);
return $config;