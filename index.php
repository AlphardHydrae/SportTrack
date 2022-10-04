<?php
ini_set('display_errors', 'On');
// error_reporting(E_ALL);
error_reporting(FALSE);
define("__ROOT__", __DIR__);

require_once __ROOT__ . '/config.php';
require_once CONTROLLERS_DIR . '/ApplicationController.php';

// ApplicationController::getInstance()->addRoute('aproposcontroller', CONTROLLERS_DIR . '/aproposcontroller');
ApplicationController::getInstance()->addRoute('logincontroller', CONTROLLERS_DIR . '/logincontroller');
ApplicationController::getInstance()->addRoute('loginfalsecontroller', CONTROLLERS_DIR . '/loginfalsecontroller');
ApplicationController::getInstance()->addRoute('signupcontroller', CONTROLLERS_DIR . '/signupcontroller');
ApplicationController::getInstance()->addRoute('homepagecontroller', CONTROLLERS_DIR . '/homepagecontroller');
ApplicationController::getInstance()->addRoute('changecredentialscontroller', CONTROLLERS_DIR . '/changecredentialscontroller');
ApplicationController::getInstance()->addRoute('logoutcontroller', CONTROLLERS_DIR . '/logoutcontroller');
ApplicationController::getInstance()->process();
