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
	),
	'modules'=>array(
		'plat' => array(),
		'driver'=>array(),
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
			'connectionString' =>'mysql:host=localhost;dbname=hckp;port=3306',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
	),
	'params'=>array(),
);
return $config;