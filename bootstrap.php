<?php
// include PHP libraries
require 'vendor/autoload.php';

// register autoloader
require_once dirname(__FILE__).'/autoloader.php';
Autoloader::register();

// define curernt page
define('CURRENT_PAGE', pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME));
define('IS_HOME', basename($_SERVER["PHP_SELF"]) === 'index.php');

// define host url
$url  = empty($_SERVER["HTTPS"]) ? "http://" : "https://";
$url .= $_SERVER["HTTP_HOST"];
define('URL_DOMAIN', $url);
define('URL_BASE', $url.'/vanarts_portfolio/');

date_default_timezone_set('Canada/Pacific');

unset($url);