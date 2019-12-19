<?php


namespace App\Event;


use Exception;

require_once(__DIR__ . '/Hydrate.php');

class Event extends Hydrate
{

    private $_id;
    private $_email;
    private $_date;
    private $_label;
    private $_repeat = 0;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->_id = $id;
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
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        //TODO Vérifier si la date est bien valide
        $this->_date = $date;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label): void
    {
        $this->label = $label;
    }

    /**
     * @return int
     */
    public function getRepeat()
    {
        return $this->_repeat;
    }

    /**
     * @param int $repeat
     */
    public function setRepeat($repeat): void
    {
        $repeat = (int)$repeat;

        if (is_int($repeat)) {
            $this->_repeat = $repeat;
        }

    }


}