<?php
// Configuration file, for development

// Debug mode 1=debug(show errors true), 0=production(hide errors false)
define("DEBUG", 1);
// Shows the root of our project
define("ROOT", dirname(__DIR__));
// Points to a public folder
define("WWW", ROOT . '/public');
// Leads to our view folder
define("VIEW", ROOT . '/view');
// Leads to our application folder
define("APP", ROOT . '/app');
// Leads to the core of our application
define("CORE", ROOT . 'App\Utils');
// Leads to cache
define("CACHE", ROOT . '/tmp/cache');
// Leads to configuration files
define("CONF", ROOT . '/config');
// Stores our default website template
define("LAYOUT", 'light_blog');

// Get our url. To check, we substitute at the beginning of echo and get http://localhost /index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// Replace and cut all symbols (actually cut off index.php) get http://localhost /
$app_path = preg_replace("#[^/]+$#", '', $app_path);
// Write our url to a constant
define("PATH", $app_path);



