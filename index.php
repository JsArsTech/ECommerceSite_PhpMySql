<?php

// Activate session
session_start();

require_once 'include/config.php';
require_once BUSINESS_DIR . 'error_handler.php';
// Load the application page template
require_once PRESENTATION_DIR . 'application.php';
// Load the database handler
require_once BUSINESS_DIR . 'database_handler.php';
// Load Business Tier
require_once BUSINESS_DIR . 'catalog.php';

ErrorHandler::SetHandler();

// Load the application page template
require_once PRESENTATION_DIR . 'application.php';
require_once PRESENTATION_DIR . 'link.php';

$application = new Application();
/*
$application->registerPlugin('function', 'load_presentation_object', 
	'load_presentation_object');
*/
$application->display('store_front.tpl');

$result = Catalog::GetDepartments();

echo '<ul>';

foreach ($result as $r)
{
	echo "<li>{$r['department_id']} => {$r['name']}</li>";
} 

echo '</ul>';


// Close database connection
DatabaseHandler::Close();
?>