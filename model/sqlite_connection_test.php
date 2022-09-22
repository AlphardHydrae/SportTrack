<?php
require_once 'UserDAO.php';
require_once 'ActivityDAO.php';
require_once 'ActivityEntryDAO.php';

echo '<h2>User</h2>';
$result = UtilisateurDAO::getInstance() -> findAll();
var_dump($result);

echo '<h2>Activity</h2>';
$result = ActivityDAO::getInstance() -> findAll();
var_dump($result);

echo '<h2>Data</h2>';
$result = ActivityEntryDAO::getInstance() -> findAll();
var_dump($result);
?>