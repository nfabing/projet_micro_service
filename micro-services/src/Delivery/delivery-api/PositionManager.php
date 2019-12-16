<?php

namespace App\Delivery;

use PDO;

require_once('Manager.php');


class PositionManager extends Manager
{

    public function add(Position $position)
    {
        $_db = $this->connect();
        //ajouter une position a un colis
        $q = $_db->prepare('INSERT INTO positions(parcelNumber, latitude, longitude, date) VALUES(?, ?, ?, NOW())');
        $q->execute(array($position->getParcelNumber(), $position->getLatitude(), $position->getLongitude()));

        $position->hydrate([
            'id' => $_db->lastInsertId(),
            'date' => date("Y-m-d H:i:s"), //format DATETIME
        ]);

    }

    public function get($info)
    {
        if (is_string($info)) {
            $_db = $this->connect();
            $q = $_db->prepare('SELECT * FROM positions WHERE parcelNumber = ?');
            $q->execute(array($info));

            //On ajoute chaque position d'un colis dans un tableau
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
                //  $position[] = new Position($donnees);
                $position[] = $donnees;
            }

            return $position;

        }

    }

    public function getList()
    {
        //Récupération des positions de tous les colis
        $_db = $this->connect();
        $q = $_db->query('SELECT * FROM positions');

        //On ajoute chaque position dans un tableau
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            //$position[] = new Position($donnees);
            $position[] = $donnees;
        }

        return $position;
    }

    public function exist($info)
    {
        //Vérification si un colis existe déja avec son parcelNumber
        $_db = $this->connect();
        $q = $_db->prepare('SELECT COUNT(*) FROM positions WHERE parcelNumber = ?');
        $q->execute(array($info));

        return $q->fetchColumn();


    }
}