<?php
/**
 * Affiche le nom et prénom dans le navigateur
 */
require ('index.html');
require ('connect_form.php');
class apropos{
	$ret = $data['lastname'];
	$ret = $ret + "<br>";
	$ret = $ret + $data['firstname'];
	echo $ret;
}

?>