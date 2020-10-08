<?php
define( "APPLICATION_PATH", dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."application");
define( "CONTROLLERS_PATH" , APPLICATION_PATH . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR . "controlleurs");
define( "MODELS_PATH" , APPLICATION_PATH . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR . "modeles");
define( "VIEW_PATH" , APPLICATION_PATH . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR . "vues");
define( "CONTROLLER_PATH" , APPLICATION_PATH . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR . "controlleurs");
define( "TRAITEMENT_PATH" , APPLICATION_PATH . DIRECTORY_SEPARATOR . "traitements");

define('DSN_BDD1',"mysql:host=localhost;dbname=db1");
define('USER_BDD1',"user1");
define('PASS_BDD1',"pass1");

define('DSN_BDD2',"mysql:host=localhost;dbname=db2");
define('USER_BDD2',"user2");
define('PASS_BDD2',"pass2");

define('PATH_URL',"http://dsn.localhost/");