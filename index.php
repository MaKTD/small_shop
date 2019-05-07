<?php
// FRONT CONTROLLER 



// 1.General settings
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// 2. Including system files
define("ROOT", dirname(__FILE__));
require_once ROOT.'/components/Autoload.php';


// 3. DB connection

// 4. call Router 

$router = new Router();
$router->run();

