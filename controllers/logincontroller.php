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

            // session_start();
            // $_SESSION['lastname'] = $user->getNom();
            // $_SESSION['firstname'] = $user->getPrenom();
            // $_SESSION['dob'] = $user->getDob();
            // $_SESSION['gender'] = $user->getSexe();
            // $_SESSION['height'] = $user->getTaille();
            // $_SESSION['weight'] = $user->getPoids();
            // $_SESSION["email"] = $user->getEmail();
            // $_SESSION['pwd'] = $user->getMdp();
        } else {
            $page = 'login_false';
            $arr = [];
        }

        $this->render($page, $arr);
    }
}
