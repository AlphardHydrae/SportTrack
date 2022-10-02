<?php
require __ROOT__ . '/controllers/Controller.php';
require_once __ROOT__ . '/model/Utilisateur.php';
require_once __ROOT__ . '/model/UserDAO.php';

class logincontroller extends Controller
{

    public function get($request)
    {
        $this->render('login', []);
    }

    public function post($request)
    {
        $result = UtilisateurDAO::getInstance()->findAll();
        $i = 0;
        $found = false;

        while ($i < count($result) && !$found) {
            $user = $result[$i];
            if ($user->getEmail() == $_POST['email'] && $user->getMdp() == $_POST['pwd']) {
                $found = true;
            }
            $i++;
        }

        if ($found) {
            $page = 'homepage';
            $arr = ['email' => $user->getEmail(), 'lastname' => $user->getNom(), 'firstname' => $user->getPrenom()];
        } else {
            $page = 'login_false';
            $arr = [];
        }

        $this->render($page, $arr);
    }
}
