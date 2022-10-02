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
            $this->render('homepage', ['email' => $request[$user->getEmail()], 'lastname' => $request[$user->getNom()], 'firstname' => $request[$user->getPrenom()]]);
        } else {
            $this->render('login_false', []);
        }
    }
}
