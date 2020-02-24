<?php 
	// SITE_ROOT contains full path to the tshirt shop folder 
	define('SITE_ROOT', dirname(dirname(__FILE__)));

	// Application directories 
	define('PRESENTATION_DIR', SITE_ROOT . '/presentation/');
	define('BUSINESS_DIR', SITE_ROOT . '/business/');

	// Settings needed to configure the Smarty template engine
	define('SMARTY_DIR', SITE_ROOT . '/libs/smarty/');
	define('TEMPLATE_DIR', PRESENTATION_DIR . 'templates');
	define('COMPILE_DIR', PRESENTATION_DIR . 'templates_c');
	define('CONFIG_DIR', SITE_ROOT . '/include');

	// Hould be true while developing web site
	define('IS_WARNING_FATAL', true);
	define('DEBUGGING', true);

	// The error types to be reported
	define('ERROR_TYPES', E_ALL);

	// Settings about mailing the error messages to admin
	define('SEND_ERROR_MAIL', false);
	define('ADMIN_ERROR_MAIL', 'administrator@example.com');
	define('SENDMAIL_FROM', 'errors@example.com');
	ini_set('sendmail_from', SENDMAIL_FROM);

	// By default we don't log errors to a file
	define('LOG_ERRORS', false);
	define('LOG_ERRORS_FILE', 'c:\\tshirtshop\\errors_log.txt'); // Windows
	//define('LOG_ERRORS', '/home/username/tshirtshop/errors.log') // Linux
	/* Generic error message to be displayed instead of debug info (when DEBUGGING is false) */
	define('SITE_GENERIC_ERROR_MESSAGE', '<h1>TShirtShop Error!</h1>');

	define('DB_PERSISTENCY', 'true');
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'arias666');
	define('DB_DATABASE', 'tshirtshop');
	define('PDO_DSN', 'mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE);

	// Server HTTP port (can omit if the defult 80 is used)
	define('HTTP_SERVER_PORT', '80');
	/*
	Name of the virtual directory the site runs in
	*/
	define('VIRTUAL_LOCATION', '/tshirtshop/');
?>