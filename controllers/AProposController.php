<?php
require(__ROOT__.'/controllers/Controller.php');

/**
 * Affiche le nom et prénom dans le navigateur
 */

class AProposController extends Controller {

    public function get($request) {
        $this -> render('apropos',[]);
    }
}

?>