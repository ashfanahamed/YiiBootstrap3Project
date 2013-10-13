<?php

/**
 * Main configuration.
 * All properties can be overridden in mode_<mode>.php files
 */

return array(

	// Set yiiPath (relative to Environment.php)
	/*'yiiPath' => dirname(__FILE__) . '/../../../_includes/yii-1.1.14/framework/yii.php',
	'yiicPath' => dirname(__FILE__) . '/../../../_includes/yii-1.1.14/framework/yiic.php',
	'yiitPath' => dirname(__FILE__) . '/../../../_includes/yii-1.1.14/framework/yiit.php',*/

	// Set YII_DEBUG and YII_TRACE_LEVEL flags
	'yiiDebug' => true,
	'yiiTraceLevel' => 0,

	// Static function Yii::setPathOfAlias()
	'yiiSetPathOfAlias' => array(
		// uncomment the following to define a path alias
		//'local' => 'path/to/local-folder'
	),

	// This is the main Web application configuration. Any writable
	// CWebApplication properties can be configured here.
	'configWeb' => array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name' => 'Yii Bootstrap 3.0',
        'defaultController' => 'adminDemo',

        // preloading 'log' component
        'preload'=>array('log'),

        // autoloading model and component classes
        'import'=>array(
            'application.models.*',
            'application.components.*',
            'ext.bootstrap3.widgets.*',
        ),

        // Set witch theme you want to use
        'theme' => 'bootstrap3',

        'modules'=>array(
            // uncomment the following to enable the Gii tool
        ),

        // application components
        'components'=>array(
            'user'=>array(
                // enable cookie-based authentication
                'allowAutoLogin'=>true,
            ),
            // uncomment the following to enable URLs in path-format
            'urlManager'=>array(
                'urlFormat'=>'path',
                'showScriptName' => false,
                'rules'=>array(
                    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                ),
            ),
            // uncomment the following to use a MySQL database
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=testdrive',
                'emulatePrepare' => true,
                'username' => 'sqluser',
                'password' => 'sqlpwd',
                'charset' => 'utf8',
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
                ),
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),

        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'=>array(
            // this is used in contact page
            'adminEmail'=>'webmaster@example.com',
        ),
	),

	// This is the Console application configuration. Any writable
	// CConsoleApplication properties can be configured here.
    // Leave array empty if not used.
    // Use value 'inherit' to copy from generated configWeb.
	'configConsole' => array(

		'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'name' => 'My Console Application',

		// Preloading 'log' component
		'preload' => array('log'),

		// Autoloading model and component classes
		'import'=>'inherit',

		// Application componentshome
		'components'=>array(

			// Database
			'db'=>'inherit',

			// Application Log
			'log' => array(
				'class' => 'CLogRouter',
				'routes' => array(
					// Save log messages on file
					array(
						'class' => 'CFileLogRoute',
						'levels' => 'error, warning, trace, info',
					),
				),
			),

		),

	),

);