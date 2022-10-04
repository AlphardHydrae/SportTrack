<?php
require_once 'SqliteConnection.php';
require_once 'Activity.php';

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

            $query = "INSERT INTO Activite(date,description,fMin,fMax,fMoy,hDebut,hFin,duree,distance,unUtilisateur) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $dbc->prepare($query);

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

            $stmt->execute(array($n, $p, $q, $r, $s, $t, $u, $v, $w, $x));
        }
    }

    public function delete(Activity $obj): void
    {
        if ($obj instanceof Activity) {
            $dbc = SqliteConnection::getInstance()->getConnection();

            $query = "delete from Activite WHERE date = :d";
            $stmt = $dbc->prepare($query);

            $stmt->bindValue(':d', $obj->getDate(), PDO::PARAM_STR);

            $stmt->execute();
        }
    }
}
