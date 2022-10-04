<?php
require __ROOT__ . '/controllers/Controller.php';
require_once __ROOT__ . "/model/CalculDistanceImpl.php";
require_once __ROOT__ . '/model/ActivityDAO.php';
require_once __ROOT__ . '/model/Data.php';
require_once __ROOT__ . '/model/ActivityEntryDAO.php';

class homepagecontroller extends Controller
{

    public function get($request)
    {
        session_start();
        $this->render('homepage', $_SESSION);
    }

    public function post($request)
    {
        session_start();

        $json = json_decode(file_get_contents($_FILES['file']['tmp_name']), true);

        $dist = new CalculDistanceImpl();
        $arr = array();

        foreach ($json['activity'] as $a) {
            $d_temp = $json['activity']['date'];
            $day = substr($d_temp, 0, 2);
            $month = substr($d_temp, 3, 2);
            $year = substr($d_temp, 6, 4);
            $date = $year . "-" . $month . "-" . $day;

            $de = $json['activity']['description'];
            $fMi = 300;
            $fMa = 0;

            foreach ($json['data'] as $d) {
                if ($d['cardio_frequency'] > $fMa) {
                    $fMa = $d['cardio_frequency'];
                }

                if ($d['cardio_frequency'] < $fMi) {
                    $fMi = $d['cardio_frequency'];
                }

                array_push($arr, (array("latitude" => $d['latitude'], "longitude" => $d['longitude'])));
            }

            $fMo = round(($fMi + $fMa) / 2);

            $hD_temp = $json['data'][0]['time'];
            $hours = substr($hD_temp, 0, 2);
            $min = substr($hD_temp, 3, 2);
            $sec = substr($hD_temp, 6, 2);
            $hD = strval($hours . ":" . $min . ":" . $sec);

            $hF_temp = $json['data'][count($json['data']) - 1]['time'];
            $hours = substr($hF_temp, 0, 2);
            $min = substr($hF_temp, 3, 2);
            $sec = substr($hF_temp, 6, 2);
            $hF = strval($hours . ":" . $min . ":" . $sec);

            $du = strtotime($hF) - strtotime($hD);

            $di = ($dist->calculDistanceTrajet($arr)) * 100;
            $u = $_SESSION['email'];

            $activity = new Activity();
            $activity->init($date, $de, $fMi, $fMa, $fMo, $hD, $hF, $du, $di, $u);

            try {
                ActivityDAO::getInstance()->insert($activity);

                foreach ($json['data'] as $d) {
                    $t = $d['time'];
                    $f = $d['cardio_frequency'];
                    $la = $d['latitude'];
                    $lo = $d['longitude'];
                    $alt = $d['altitude'];
                    $act = $activity->getDate();

                    $data = new Data();
                    $data->init($t, $f, $la, $lo, $alt, $act);

                    try {
                        ActivityEntryDAO::getInstance()->insert($data);
                    } catch (Exception $e) {
                        print "Error!: " . $e->getMessage() . "<br/>";
                    }
                }
            } catch (Exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
            }
        }

        $this->render('homepage', $_SESSION);
    }
}
