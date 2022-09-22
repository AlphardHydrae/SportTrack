<?php
require_once 'Utilisateur.php';
require_once 'UserDAO.php';
require_once 'ActivityDAO.php';
require_once 'ActivityEntryDAO.php';

echo '<h2>User</h2>';

echo '<h3>findAll</h3>';
$result = UtilisateurDAO::getInstance() -> findAll();
var_dump($result);

echo '<h3>insert</h3>';
$n = 'User';
$p = 'user';
$d = '2003-06-20';
$s = 'F';
$t = '165';
$pd = '58';
$e = 'User-user@gmail.com';
$m = 'user';
$user = new Utilisateur();
$user -> init($n, $p, $d, $s, $t, $pd, $e, $m);
$result = UtilisateurDAO::getInstance() -> insert($user);
$result = UtilisateurDAO::getInstance() -> findAll();
var_dump($result);

echo '<h3>delete</h3>';
$n = 'User';
$p = 'user';
$d = '2003-06-20';
$s = 'F';
$t = '165';
$pd = '58';
$e = 'User-user@gmail.com';
$m = 'user';
$user = new Utilisateur();
$user -> init($n, $p, $d, $s, $t, $pd, $e, $m);
$result = UtilisateurDAO::getInstance() -> delete($user);
$result = UtilisateurDAO::getInstance() -> findAll();
var_dump($result);

echo '<h2>Activity</h2>';
$result = ActivityDAO::getInstance() -> findAll();
var_dump($result);

echo '<h2>Data</h2>';
$result = ActivityEntryDAO::getInstance() -> findAll();
var_dump($result);
?>