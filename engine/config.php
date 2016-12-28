<?php
/*
|--------------------------------------------------------------------------
| IN_RULE - to control included files
|--------------------------------------------------------------------------
| Use IN_RULE to denie executing without including in "entry point"
*/
if(!defined("IN_RULE")) die ("Oops");
/*
|--------------------------------------------------------------------------
| Configution for DB connection
|--------------------------------------------------------------------------
*/
define('DB_NAME', 		'testuser');
define('DB_USER', 		'testuser');
define('DB_PASSWORD', 	'testpass');
define('TIMEZONE', 		'Europe/Moscow');
/*
|--------------------------------------------------------------------------
| In case when app is located in subfolder
|--------------------------------------------------------------------------
*/
define('SITE_DIRECTORY', 	'');
