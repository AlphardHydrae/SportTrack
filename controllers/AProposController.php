<?php
require __ROOT__ . '/controllers/Controller.php';

class aproposcontroller extends Controller
{
    public function get($request)
    {
        $this->render('apropos', []);
    }
}
