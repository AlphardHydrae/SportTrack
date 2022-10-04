<?php
require __ROOT__ . '/controllers/Controller.php';
require_once __ROOT__ . '/model/Utilisateur.php';
require_once __ROOT__ . '/model/UserDAO.php';

class logoutcontroller extends Controller
{

    public function get($request)
    {
        session_start();
        session_destroy();
        $this->render('login', []);
    }

    public function post($request)
    {
        session_start();

        $user = new Utilisateur();
        $user->init($_SESSION['nom'], $_SESSION['prenom'], $_SESSION['dob'], $_SESSION['gender'], $_SESSION['height'], $_SESSION['weight'], $_SESSION['email'], $_SESSION['pwd']);

        $result = UtilisateurDAO::getInstance()->delete($user);

        session_destroy();
        $this->render('login', []);
    }
}
