<?php
require __ROOT__ . '/controllers/Controller.php';

class logoutcontroller extends Controller
{

    public function get($request)
    {
        // session_destroy();
        $this->render('login', []);
    }
}
