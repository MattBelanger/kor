<?php
error_reporting(E_ALL &~ E_NOTICE);
session_start();

ini_set('display_errors', E_ALL);
define('BASE_DIR', $_SERVER['DOCUMENT_ROOT']);
define('VIEWS', BASE_DIR.'/views/');

include ('inc/autoload.php');

