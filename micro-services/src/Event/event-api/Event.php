<?php


namespace App\Event;


class Event
{

    private $id;
    private $email;
    private $date;
    private $label;
    private $repeat = 0;


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
            }
        }

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->id = $id;
        }

    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        //TODO Vérifier si la date est bien valide
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
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
        return $this->repeat;
    }

    /**
     * @param int $repeat
     */
    public function setRepeat($repeat): void
    {
        $repeat = (int)$repeat;

        if (is_int($repeat)) {
            $this->repeat = $repeat;
        }

    }


}