<?php


namespace App\Fidelity;


use Exception;

require_once(__DIR__ . '/Hydrate.php');

class Card extends Hydrate
{
    private $_email;
    private $_number = 0;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    /**
     * @param $points
     */
    public function addPoints($points)
    {
        //ajout de $points
        $points = (int)$points;

        if (is_int($points) && $points > 0) {
            $points = $this->getNumber() + $points;
            $this->setNumber($points);
        }

    }

    /**
     * @param $points
     * @return bool
     * @throws Exception
     */
    public function substractPoints($points)
    {
        //soustraction de $points
        $points = (int)$points;

        $points = $this->getNumber() - $points;


        if ($points >= 0) {

            $this->setNumber($points);
            return true;

        } else {

            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     * @throws Exception
     */
    public function setEmail($email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->_email = $email;
        } else {

            throw new Exception('Email non valide !');

        }
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->_number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $number = (int)$number;
        if (is_int($number)) {
            $this->_number = $number;
        }
        //TODO implémenter else

    }


}