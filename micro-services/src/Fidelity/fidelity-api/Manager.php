<?php


namespace App\Fidelity;


use Exception;
use PDO;
use PDOException;

class Manager
{
    //Paramètres connexion BDD
    const HOST_NAME = 'localhost';
    const DATABASE = 'fidelity';
    const USER_NAME = 'root';
    const PASSWORD = '';

    public function connect()
    {
        $_db = new PDO('mysql:host=' . self::HOST_NAME . '; dbname=' . self::DATABASE, self::USER_NAME, self::PASSWORD);
        return $_db;
    }


}