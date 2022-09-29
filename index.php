<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
define ("__ROOT__",__DIR__);
// Configuration
require_once (__ROOT__.'/config.php');

// ApplicationController
require_once (CONTROLLERS_DIR.'/ApplicationController.php');


// Add routes here
// ApplicationController::getInstance() -> addRoute('connect', CONTROLLERS_DIR.'/connect.php');
ApplicationController::getInstance() -> addRoute('AProposController', CONTROLLERS_DIR.'/AProposController.php');
ApplicationController::getInstance() -> addRoute('AddUserController', CONTROLLERS_DIR.'/AddUserController.php');


// Process the request
ApplicationController::getInstance() -> process();
?>
