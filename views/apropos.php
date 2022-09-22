<?php
/**
 * Affiche le nom et prénom dans le navigateur
 */
require ('index.html');
require ('connect_form.php');
class apropos{
	public string get(){
		string ret = $data['lastname'];
		ret = ret + "<br>";
		ret = ret + $data['firstname'];
		return ret;
	}
}

?>