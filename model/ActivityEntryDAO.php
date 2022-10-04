<?php
require_once('SqliteConnection.php');
require_once('Data.php');

class ActivityEntryDAO
{
    private static ActivityEntryDAO $dao;

    private function __construct()
    { /* Constructor */
    }

    public static function getInstance(): ActivityEntryDAO
    {
        if (!isset(self::$dao)) {
            self::$dao = new ActivityEntryDAO();
        }
        return self::$dao;
    }

    public final function findAll(): array
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        $stmt = $dbc->prepare("SELECT * FROM Data ORDER BY time");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Data');
    }

    public final function insert(Data $st): void
    {
        if ($st instanceof Data) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "insert into Data(time,freqCardiaque,latitude,longitude,altitude, uneActivite) values (:t, :f, :la, :lo, :a, :act)";
            $stmt = $dbc->prepare($query);

            // bind the parameters
            $stmt->bindValue(':t', $st->getTime(), PDO::PARAM_STR);
            $stmt->bindValue(':f', $st->getFrequenceCardiaque(), PDO::PARAM_STR);
            $stmt->bindValue(':la', $st->getLatitude(), PDO::PARAM_STR);
            $stmt->bindValue(':lo', $st->getLongitude(), PDO::PARAM_STR);
            $stmt->bindValue(':a', $st->getAltitude(), PDO::PARAM_STR);
            $stmt->bindValue(':act', $st->getActivite(), PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete(Data $obj): void
    {
        if ($obj instanceof Data) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from Data WHERE time = :t";
            $stmt = $dbc->prepare($query);
            // bind the parameters
            $stmt->bindValue(':t', $obj->getTime(), PDO::PARAM_STR);
            // execute the prepared statement
            $stmt->execute();
        }
    }

    // public function update(Data $obj): void {
    //     if($obj instanceof Data){
    //         $dbc = SqliteConnection:getInstance()->getConnection();
    //         // prepare the SQL statement
    //         $query = "update from Activite WHERE date = :d";
    //         $stmt = $dbc -> prepare($query);
    //         // bind the parameters
    //         $stmt ->bindValue(':d', $obj -> getDate(),PDO::PARAM_STR);
    //         // execute the prepared statement
    //         $stmt ->execute();
    //     }
    // }
}
