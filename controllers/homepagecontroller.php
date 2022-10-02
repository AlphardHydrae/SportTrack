<?php
require(__ROOT__ . '/controllers/Controller.php');

class homepagecontroller extends Controller
{

    public function get($request)
    {
        $this->render('homepage', ['email' => $request['email'], 'lastname' => $request['lastname'], 'firstname' => $request['firstname']]);
    }

    public function post($request)
    {
        $this->render('homepage', []);
    }
}
