<?php
    #Ajouter,modifier,supprimer,lister les activités sportives,get
    #require_once("SqliteConnection.php";
class ActivityDAO 
{
    /**
     * À l’instar de la séance précédente, écrivez une classe ActivityDAO 
     * permettant d’ajouter, de modifier, de supprimer et de lister les activités sportives contenues dans votre base de données.
     * Cette classe devra également permettre d’obtenir les activités sportives d’un utilisateur en particulier.
     */

    private $date;
    private $description;
    private $fMin;
    private $fMax;
    private $fMoy;
    private $hDebut;
    private $hFin;
    private $duree;
    private $distance;



    function createActivity($date,$description,$fMin,$fMax,$fMoy,$hDebut,$hFin,$duree,$distance){ #Insert les datas rentrer en paramètre dans la db.
    }


}

?>