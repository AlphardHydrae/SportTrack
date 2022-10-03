<?php
require(__ROOT__ . '/controllers/Controller.php');
require_once __ROOT__ . '/model/SqliteConnection.php';
require_once __ROOT__ . '/model/Activity.php';
require_once __ROOT__ . '/model/ActivityDAO.php';
require_once __ROOT__ . '/model/Data.php';
require_once __ROOT__ . '/model/ActivityEntryDAO.php';

class homepagecontroller extends Controller
{

    public function get($request)
    {
        $this->render('homepage', ['email' => $request['email'], 'lastname' => $request['lastname'], 'firstname' => $request['firstname']]);
    }

    public function post($request)
    {
        $json = json_decode(file_get_contents($_FILES['file']['tmp_name']), true);

        foreach ($json['activity'] as $a) {
            $d = $a['date'];
            $de = $a['description'];

            foreach ($json['data'] as $d) {
                $t = $d['time'];
                $f = $d['cardio_frequency'];
                $la = $d['latitude'];
                $lo = $d['longitude'];
                $act = $d['altitude'];

                $data = new Data();
                $data->init($t, $f, $la, $lo, $act);

                ActivityEntryDAO::getInstance()->insert($data);
            }

            $fMi = $a['dob'];

            $dbc = SqliteConnection::getInstance()->getConnection();
            $query = "SELECT sexe FROM Utilisateur WHERE email = ?";
            $stmt = $dbc->prepare($query);
            $stmt->execute(array($request['email']));
            $fMa = $stmt->fetchAll();

            $fMo = ($fMi + $fMa) / 2;
            $hD = $json['data'][0];
            $hF = $json['data'][count($json['data']) - 1];
            $du = $hF - $hD;
            $di = $request['email'];

            $activity = new Activity();
            $activity->init($d, $de, $fMi, $fMa, $fMo, $hD, $hF, $du, $di);

            ActivityDAO::getInstance()->insert($activity);
        }

        $this->render('homepage', ['email' => $request['email'], 'lastname' => $request['lastname'], 'firstname' => $request['firstname']]);
    }
}
