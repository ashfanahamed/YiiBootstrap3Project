<?php

/**
 * Local configuration override.
 * Use this to override elements in the config array (combined from main.php and mode_x.php)
 * NOTE: When using a version control system, do NOT commit this file to the repository.
 */

return array(
	// This is the specific Web application configuration for this mode.
	// Supplied config elements will be merged into the main config array.
	'configWeb' => array(
		// Application components
		'components' => array(
			// Database
			'db' => array(
                'connectionString' => 'mysql:host=yourHost;dbname=yourDbName',
                'emulatePrepare' => true,
                'username' => 'yourUser',
                'password' => 'yourPass',
                'charset' => 'utf8',
			),
		),
	),

	// This is the Console application configuration. Any writable
	// CConsoleApplication properties can be configured here.
	// Use 'inherit' to copy from generated configWeb
	'configConsole' => array(
		// Application components
		'components' => array(
			// Database
            'db' => 'inherit',
		),
	),
);