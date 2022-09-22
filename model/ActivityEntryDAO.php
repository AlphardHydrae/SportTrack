<?php
<?php

require_once('SqliteConnection.php');
class ActivityEntryDAO {
    private static ActivityEntryDAO $dao;

    private function __construct() {}

    public static function getInstance(): ActivityEntryDAO {
        if(!isset(self::$dao)) {
            self::$dao= new ActivityEntryDAO();
        }
        return self::$dao;
    }

    public final function findAll(): Array{
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from Data order by time";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Data');
        return $results;
    }

    public final function insert(Activite $st): void{
        if($st instanceof Activite){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "insert into Data(time,frequenceCardiaque,latitude,longitude,altitude) values (:t, :f, :la, :lo, :a)";
            $stmt = $dbc->prepare($query);

            // bind the parameters
            $stmt->bindValue(':t',$st->getTime(),PDO::PARAM_STR);
            $stmt->bindValue(':f',$st->getFrequenceCardiaque(),PDO::PARAM_STR);
            $stmt->bindValue(':la',$st->getLatitude(),PDO::PARAM_STR);
            $stmt->bindValue(':lo',$st->getLongitude(),PDO::PARAM_STR);
            $stmt->bindValue(':a',$st->getAltitude(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete(Activite $obj): void { 
        if($obj instanceof Activite){
            $dbc = SqliteConnection:getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from Data WHERE time = :t";
            $stmt = $dbc -> prepare($query);
            // bind the parameters
            $stmt ->bindValue(':t', $obj -> getTime(),PDO::PARAM_STR);
            // execute the prepared statement
            $stmt ->execute();
        }
        
     }

    public function update(Activite $obj): void {
        //if($obj instanceof Activite){
            //$dbc = SqliteConnection:getInstance()->getConnection();
            // prepare the SQL statement
            //$query = "update from Activite WHERE date = :d";
            //$stmt = $dbc -> prepare($query);
            // bind the parameters
            //$stmt ->bindValue(':d', $obj -> getDate(),PDO::PARAM_STR);
            // execute the prepared statement
            //$stmt ->execute();
        //}
        
    }
}

?>
?>