<?php
require(__ROOT__ . '/controllers/Controller.php');
require_once __ROOT__ . "/model/SqliteConnection.php";

class homepagecontroller extends Controller
{

    public function get($request)
    {
        $this->render('homepage', ['email' => $request['email'], 'lastname' => $request['lastname'], 'firstname' => $request['firstname']]);
    }

    public function post($request)
    {
        foreach ($_POST['file']['activity'] as $activity) {
            $dbc = SqliteConnection::getInstance()->getConnection();

            $queryActivity = "INSERT INTO Activite VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmtActivity = $dbc->prepare($queryActivity);


            foreach ($_POST['file']['data'] as $data) {
                $queryData = "INSERT INTO Data VALUES (?,?,?,?,?,?)";
                $stmtData = $dbc->prepare($queryData);
            }
        }

        $this->render('homepage', ['email' => $request['email'], 'lastname' => $request['lastname'], 'firstname' => $request['firstname']]);
    }
}
