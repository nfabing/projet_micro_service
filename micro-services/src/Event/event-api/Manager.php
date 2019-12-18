<?php


namespace App\Event;

use PDO;

class Manager
{
    //Paramètres connexion BDD
    const HOST_NAME = 'localhost';
    const DATABASE = 'event';
    const USER_NAME = 'root';
    const PASSWORD = '';

    public function connect()
    {

        $_db = new PDO('mysql:host=' . self::HOST_NAME . '; dbname=' . self::DATABASE, self::USER_NAME, self::PASSWORD);
        return $_db;


    }


}