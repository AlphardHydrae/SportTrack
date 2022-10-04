<?php
require __ROOT__ . '/controllers/Controller.php';
require_once __ROOT__ . '/model/Utilisateur.php';
require_once __ROOT__ . '/model/UserDAO.php';

class signupcontroller extends Controller
{

    public function get($request)
    {
        $this->render('signup', []);
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
        $e = $_POST['email'];
        $m = $_POST['pwd'];

        $user = new Utilisateur();
        $user->init($n, $p, $d, $s, $t, $pd, $e, $m);

        $result = UtilisateurDAO::getInstance()->insert($user);

        $_SESSION['lastname'] = $user->getNom();
        $_SESSION['firstname'] = $user->getPrenom();
        $_SESSION['dob'] = $user->getDob();
        $_SESSION['gender'] = $user->getSexe();
        $_SESSION['height'] = $user->getTaille();
        $_SESSION['weight'] = $user->getPoids();
        $_SESSION["email"] = $user->getEmail();
        $_SESSION['pwd'] = $user->getMdp();

        $this->render('homepage', $_SESSION);
    }
}
