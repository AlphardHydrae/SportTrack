<?php
require(__ROOT__ . '/controllers/Controller.php');

class signupcontroller extends Controller
{

    public function get($request)
    {
        $this->render('signup', []);
    }

    public function post($request)
    {
        $this->render('homepage', ['firstname' => $request['firstname'], 'lastname' => $request['lastname']]);
    }
}
