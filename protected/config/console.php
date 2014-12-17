<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR . '..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

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