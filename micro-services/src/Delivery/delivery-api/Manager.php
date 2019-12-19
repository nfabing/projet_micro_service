<?php

namespace App\Delivery;

use PDO;


class Manager
{
    //Paramètres connexion BDD
    const HOST_NAME = 'localhost';
    const DATABASE = 'transport';
    const USER_NAME = 'root';
    const PASSWORD = 'root';

    public function connect()
    {
            $_db = new PDO('mysql:host=' . self::HOST_NAME . '; dbname=' . self::DATABASE, self::USER_NAME, self::PASSWORD);
            return $_db;
    }


}