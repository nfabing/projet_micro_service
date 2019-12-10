<?php

namespace App\Delivery;

use PDO;
use PDOException;

class Manager
{
    //Paramètres connexion BDD
    const HOST_NAME = 'localhost';
    const DATABASE = 'transport';
    const USER_NAME = 'root';
    const PASSWORD = '';

    public function connect()
    {
        try {
            $_db = new PDO('mysql:host=' . self::HOST_NAME . '; dbname=' . self::DATABASE, self::USER_NAME, self::PASSWORD);
            return $_db;

        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


}