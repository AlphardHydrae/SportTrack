<?php
require __ROOT__ . '/controllers/Controller.php';
require_once __ROOT__ . '/model/Utilisateur.php';
require_once __ROOT__ . '/model/UserDAO.php';

class changecredentialscontroller extends Controller
{

    public function get($request)
    {
        $this->render('changecredentials', ['email' => $request['email'], 'lastname' => $request['lastname'], 'firstname' => $request['firstname']]);
    }

    public function post($request)
    {
        $this->render('homepage', ['email' => $request['email'], 'lastname' => $request['lastname'], 'firstname' => $request['firstname']]);
    }
}
