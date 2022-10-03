<?php
require(__ROOT__ . '/controllers/Controller.php');
require_once __ROOT__ . "/model/CalculDistanceImpl.php";
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
        // print_r($json);

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
                $t = $d['time'];
                $f = $d['cardio_frequency'];

                if ($f > $fMa) {
                    $fMa = $f;
                }

                if ($f < $fMi) {
                    $fMi = $f;
                }

                $la = $d['latitude'];
                $lo = $d['longitude'];

                array_push($arr, (array("latitude" => $la, "longitude" => $lo)));

                $alt = $d['altitude'];

                $data = new Data();
                $data->init($t, $f, $la, $lo, $alt);

                try {
                    ActivityEntryDAO::getInstance()->insert($data);
                } catch (Exception $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                }
            }

            $fMo = ($fMi + $fMa) / 2;

            $hD_temp = $json['data'][0]['time'];
            $hours = substr($hD_temp, 0, 2);
            $min = substr($hD_temp, 3, 2);
            $sec = substr($hD_temp, 6, 2);
            $hD_calc = intval($hours . $min . $sec);
            $hD = $hours . ":" . $min . ":" . $sec;

            $hF_temp = $json['data'][count($json['data']) - 1]['time'];
            $hours = substr($hF_temp, 0, 2);
            $min = substr($hF_temp, 3, 2);
            $sec = substr($hF_temp, 6, 2);
            $hF_calc = intval($hours . $min . $sec);
            $hF = $hours . ":" . $min . ":" . $sec;

            $du = $hF_calc - $hD_calc;
            // $hours = substr($du_temp, 0, 2);
            // $min = substr($du_temp, 3, 2);
            // $sec = substr($du_temp, 6, 2);
            // $du = $hours . ":" . $min . ":" . $sec;

            $di = $dist->calculDistanceTrajet($arr);
            $u = $request['email'];

            $activity = new Activity();
            $activity->init($date, $de, $fMi, $fMa, $fMo, $hD, $hF, $du, $di, $u);

            try {
                ActivityDAO::getInstance()->insert($activity);
            } catch (Exception $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
            }
        }

        $this->render('homepage', ['email' => $request['email'], 'lastname' => $request['lastname'], 'firstname' => $request['firstname']]);
    }
}
