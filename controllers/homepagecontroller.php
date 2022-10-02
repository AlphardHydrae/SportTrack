<?php
require(__ROOT__ . '/controllers/Controller.php');

class homepagecontroller extends Controller
{

    public function get($request)
    {
        $this->render('homepage', []);
    }

    public function post($request)
    {
        $this->render('changecredentials', ['firstname' => $request['firstname'], 'lastname' => $request['lastname']]);
    }
}
