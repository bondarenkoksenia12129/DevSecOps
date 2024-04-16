<?php
/*
* ERRORS: display and reporting level
*/
ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT);

$cf = array (
/*
* DATABASE
*/
	'hostname'=>'localhost',
	'username'=>'root',
	'password'=>'mysql',
	'database'=>'huts',
	
    'default_theme' => 'basic', 
	
	'default_template' => 'index',
	
) ;

define('SF', $_SERVER['PHP_SELF']);