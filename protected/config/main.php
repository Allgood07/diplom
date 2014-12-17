<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',


    'language' => 'ru',
    'sourceLanguage' => 'ru_ru',
    'charset' => 'utf-8',


	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
        'application.models.tables.*',
		'application.components.*',
	),

	'modules'=>array(

        'gii' => [
            'class' => 'system.gii.GiiModule',
            'generatorPaths' => [
                'ext.giix-core', // giix generators
            ],
            'password' => '123',
            'ipFilters' => ['*'],
        ],
	),

	// application components
	'components'=>array(

        'db' => [
            'tablePrefix' => '',
            'connectionString' => 'pgsql:host=localhost;port=5432;dbname=postgres',
            'username' => 'postgres',
            'password' => '1',
            'charset' => 'UTF8',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ],

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),



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