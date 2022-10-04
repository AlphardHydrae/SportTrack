<?php
require_once('SqliteConnection.php');
require_once('Activity.php');

class ActivityDAO
{
    private static ActivityDAO $dao;

    private function __construct()
    { /* Constructor */
    }

    public static function getInstance(): ActivityDAO
    {
        if (!isset(self::$dao)) {
            self::$dao = new ActivityDAO();
        }
        return self::$dao;
    }

    public final function findAll(): array
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        $stmt = $dbc->prepare("SELECT * FROM Activite ORDER BY date");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Activity');
    }

    public final function insert(Activity $st): void
    {
        if ($st instanceof Activity) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Activite(date,description,fMin,fMax,fMoy,hDebut,hFin,duree,distance,unUtilisateur) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $dbc->prepare($query);

            // bind the parameters
            // $stmt->bindValue(':n',$st->getDate(),PDO::PARAM_STR);
            // $stmt->bindValue(':p',$st->getDescription(),PDO::PARAM_STR);
            // $stmt->bindValue(':q',$st->getFMin(),PDO::PARAM_STR);
            // $stmt->bindValue(':r',$st->getFMax(),PDO::PARAM_STR);
            // $stmt->bindValue(':s',$st->getFMoy(),PDO::PARAM_STR);
            // $stmt->bindValue(':t',$st->getHDebut(),PDO::PARAM_STR);
            // $stmt->bindValue(':u',$st->getHFin(),PDO::PARAM_STR);
            // $stmt->bindValue(':v',$st->getDuree(),PDO::PARAM_STR);
            // $stmt->bindValue(':w',$st->getDistance(),PDO::PARAM_STR);

            $n = $st->getDate();
            $p = $st->getDescription();
            $q = $st->getFMin();
            $r = $st->getFMax();
            $s = $st->getFMoy();
            $t = $st->getHDebut();
            $u = $st->getHFin();
            $v = $st->getDuree();
            $w = $st->getDistance();
            $x = $st->getUtilisateur();

            // execute the prepared statement
            $stmt->execute(array($n, $p, $q, $r, $s, $t, $u, $v, $w, $x));
        }
    }

    public function delete(Activity $obj): void
    {
        if ($obj instanceof Activity) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from Activite WHERE date = :d";
            $stmt = $dbc->prepare($query);
            // bind the parameters
            $stmt->bindValue(':d', $obj->getDate(), PDO::PARAM_STR);
            // execute the prepared statement
            $stmt->execute();
        }
    }

    // public function update(Activity $obj): void {
    //      if($obj instanceof Activity){
    //          $dbc = SqliteConnection::getInstance()->getConnection();
    //          // prepare the SQL statement
    //          $query = "UPDATE Activite SET ($description = :p,$fMin = :q, $fMax = :r, $fMoy = :s, $hDebut = :t, $hFin = :u, $duree = :v , $distance = :w )  WHERE $date = :n";
    //          $stmt = $dbc -> prepare($query);
    //          // bind the parameters
    //         $stmt->bindValue(':n',$st->getDate(),PDO::PARAM_STR);
    //         $stmt->bindValue(':p',$st->getDescription(),PDO::PARAM_STR);
    //         $stmt->bindValue(':q',$st->getFMin(),PDO::PARAM_STR);
    //         $stmt->bindValue(':r',$st->getFMax(),PDO::PARAM_STR);
    //         $stmt->bindValue(':s',$st->getFMoy(),PDO::PARAM_STR);
    //         $stmt->bindValue(':t',$st->getHDebut(),PDO::PARAM_STR);
    //         $stmt->bindValue(':u',$st->getHFin(),PDO::PARAM_STR);
    //         $stmt->bindValue(':v',$st->getDuree(),PDO::PARAM_STR);
    //         $stmt->bindValue(':w',$st->getDistance(),PDO::PARAM_STR);
    //          // execute the prepared statement
    //          $stmt ->execute();
    //      } 
    //  }
}
