<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("VENDOR_PATH", dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."vendor");
//require APPLICATION_PATH.DIRECTORY_SEPARATOR."autoloader.php";
require VENDOR_PATH.DIRECTORY_SEPARATOR."autoload.php";

$poo_v2 = new \MVC\Classe\Application();
$poo_v2->launch();
