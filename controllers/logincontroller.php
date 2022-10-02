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
            if ($result[$i]->getEmail() == $_POST['email'] && $result[$i]->getMdp() == $_POST['pwd']) {
                $found = true;
            }
            $i++;
        }

        if ($found) {
            $this->render('homepage', ['email' => $request['email']]);
        } else {
            $this->render('login_false', []);
        }
    }
}
