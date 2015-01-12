<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */

//Start the Session
session_start(); 

// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'application/');
define('_JEXEC', 1);

// Includes
require_once(APP_DIR .'config/config.php');
require_once(ROOT_DIR .'system/model.php');
require_once(ROOT_DIR .'system/view.php');
require_once(ROOT_DIR .'system/controller.php');
require_once(ROOT_DIR .'system/pip.php');

// Define base URL
global $config;
define('BASE_URL', $config['base_url']);

pip();

?>
