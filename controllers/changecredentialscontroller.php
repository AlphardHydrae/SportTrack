<?php
require __ROOT__ . '/controllers/Controller.php';
require_once __ROOT__ . '/model/Utilisateur.php';
require_once __ROOT__ . '/model/UserDAO.php';

class changecredentialscontroller extends Controller
{

    public function get($request)
    {
        session_start();

        $this->render('changecredentials', $_SESSION);
    }

    public function post($request)
    {
        session_start();

        $n = $_POST['lastname'];
        $p = $_POST['firstname'];
        $d = $_POST['dob'];

        if ($_POST['genderM'] == "on") {
            $s = "M";
        } else {
            $s = "F";
        }

        $t = $_POST['height'];
        $pd = $_POST['weight'];
        $e = $_SESSION['email'];
        $m = $_POST['pwd'];

        $user = new Utilisateur();
        $user->init($n, $p, $d, $s, $t, $pd, $e, $m);

        $result = UtilisateurDAO::getInstance()->update($user);

        $this->render('homepage', $_SESSION);
    }
}
