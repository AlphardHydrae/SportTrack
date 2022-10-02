<?php
require __ROOT__ . '/controllers/Controller.php';
require_once __ROOT__ . '/model/Utilisateur.php';
require_once __ROOT__ . '/model/UserDAO.php';

class changecredentialscontroller extends Controller
{

    public function get($request)
    {
        $this->render('changecredentials', []);
    }

    public function post($request)
    {
        $n = $_POST['lastname'];
        $p = $_POST['firstname'];
        $d = $_POST['dob'];
        $s = $_POST['gender'];
        $t = $_POST['height'];
        $pd = $_POST['weight'];
        $e = $_POST['email'];
        $m = $_POST['pwd'];

        $user = new Utilisateur();
        $user->init($n, $p, $d, $s, $t, $pd, $e, $m);

        $result = UtilisateurDAO::getInstance()->insert($user);

        $this->render('homepage', ['email' => $request[$user->getEmail()], 'lastname' => $request[$user->getNom()], 'firstname' => $request[$user->getPrenom()]]);
    }
}
