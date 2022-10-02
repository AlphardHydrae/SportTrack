<?php
ini_set('display_errors', 'On');
// error_reporting(E_ALL);
error_reporting(FALSE);
define("__ROOT__", __DIR__);
// Configuration
require_once(__ROOT__ . '/config.php');

// ApplicationController
require_once(CONTROLLERS_DIR . '/ApplicationController.php');


// Add routes here
// ApplicationController::getInstance()->addRoute('aproposcontroller', CONTROLLERS_DIR . '/aproposcontroller');
ApplicationController::getInstance()->addRoute('logincontroller', CONTROLLERS_DIR . '/logincontroller');
ApplicationController::getInstance()->addRoute('loginfalsecontroller', CONTROLLERS_DIR . '/loginfalsecontroller');
ApplicationController::getInstance()->addRoute('signupcontroller', CONTROLLERS_DIR . '/signupcontroller');
ApplicationController::getInstance()->addRoute('changecredentialscontroller', CONTROLLERS_DIR . '/changecredentialscontroller');


// Process the request
ApplicationController::getInstance()->process();
