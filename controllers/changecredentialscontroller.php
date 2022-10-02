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
        $this->render('homepage', ['email' => $request[$user->getEmail()], 'lastname' => $request[$user->getNom()], 'firstname' => $request[$user->getPrenom()]]);
    }
}
