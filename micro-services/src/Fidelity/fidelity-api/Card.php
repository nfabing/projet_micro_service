<?php


namespace App\Fidelity;


use Exception;

class Card
{
    private $_email;
    private $_number = 0;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                trigger_error('Setter non existant');
                die;
            }
        }
    }

    /**
     * @param $points
     */
    public function addPoints($points)
    {
        //ajout de $points
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

        $points = $this->getNumber() - $points;

        if ($points >= 0) {
            $this->setNumber($points);


        } else {

            throw new Exception('Pas assez de points ! ');
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
     */
    public function setEmail($email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->_email = $email;
        } else {
            //TODO implémenter else
            echo 'Email Invalide';
            die();
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