<?php


namespace App\Fidelity;

include_once('Manager.php');

use PDO;

class CardManager extends Manager
{


    public function add(Card $card)
    {
        //création d'un client
        $_db = $this->connect();
        $q = $_db->prepare('INSERT INTO client(email, number) VALUES (? , 50)');
        $q->execute(array($card->getEmail()));

        $card->hydrate([
            'number' => 50,
        ]);
    }


    public function update(Card $card)
    {
        //mettre a jour les points de fidelité d'un client
        $_db = $this->connect();
        $q = $_db->prepare('UPDATE client SET number = ? WHERE email= ?');
        $q->execute(array($card->getNumber(), $card->getEmail()));

    }


    public function exist($email)
    {
        //On vérifie que le client existe
        $_db = $this->connect();
        $q = $_db->prepare('SELECT COUNT(*) FROM client WHERE email= ?');
        $q->execute(array($email));

        //var_dump($q->fetchColumn());die();
        return (bool)$q->fetchColumn();

    }


    public function get($email)
    {
        //on récupère les points d'un client avec son email
        $_db = $this->connect();
        $q = $_db->prepare('SELECT email, number FROM client WHERE email= ?');
        $q->execute(array($email));

        $card = $q->fetch(PDO::FETCH_ASSOC);
        return $card;

    }
    /*
        public function getObject(Card $card)
        {
            //on récupère les points d'un client avec son email
            $_db = $this->connect();
            $q = $_db->prepare('SELECT number FROM client WHERE email= ?');
            $q->execute(array($card->getEmail()));

            $donnees = $q->fetch(PDO::FETCH_ASSOC);

            $card->hydrate([
                'number' => $donnees['number'],
            ]);


        }
    */

}