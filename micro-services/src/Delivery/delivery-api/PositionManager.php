<?php

namespace App\Delivery;

use PDO;

require_once('Manager.php');


class PositionManager extends Manager
{

    public function add(Position $position, bool $exist)
    {
        $date = date("Y-m-d H:i:s"); //format DATETIME

        $position->hydrate([
            'date' => $date,
        ]);

        $_db = $this->connect();

        if ($exist == false) {
            $q = $_db->prepare('INSERT INTO parcel(parcelNumber) VALUES(?)');
            $q->execute(array($position->getParcelNumber()));

            $idColis = $_db->lastInsertId();

            $q = $_db->prepare('INSERT INTO positions(parcelNumber, latitude, longitude, date) VALUES(?, ?, ?, ?)');
            $q->execute(array($idColis, $position->getLatitude(), $position->getLongitude(), $position->getDate()));
        } elseif ($exist == true) {


            $q = $_db->prepare('INSERT INTO positions(parcelNumberId, latitude, longitude, date) VALUES((
            SELECT id FROM parcel WHERE parcelNumber = ?), ?, ?, ?)');
            $q->execute(array($position->getParcelNumber(), $position->getLatitude(), $position->getLongitude(), $position->getDate()));
        }

    }

    public function get($info)
    {
        if (is_string($info)) {
            $_db = $this->connect();
            $q = $_db->prepare('SELECT parcel.parcelNumber, positions.latitude, positions.longitude, positions.date FROM positions 
        INNER JOIN parcel ON positions.parcelNumberId=parcel.id WHERE parcel.parcelNumber = ?');
            $q->execute(array($info));

            //On ajoute chaque position d'un colis dans un tableau
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {

                $position[] = $donnees;
            }

            return $position;

        }

    }

    public function getList()
    {
        //Récupération des positions de tous les colis
        $_db = $this->connect();
        $q = $_db->query('SELECT parcel.id, parcel.parcelNumber FROM parcel');

        //On ajoute chaque position dans un tableau
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            //$position[] = new Position($donnees);
            $position[] = $donnees;
        }

        return $position;
    }

    public function exist($info)
    {
        //Vérification si colis déjà existant
        $_db = $this->connect();
        $q = $_db->prepare('SELECT COUNT(*) FROM parcel WHERE parcelNumber = ?');
        $q->execute(array($info));

        return (bool)$q->fetchColumn();


    }
}