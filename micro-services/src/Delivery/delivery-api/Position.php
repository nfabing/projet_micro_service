<?php


namespace App\Delivery;


class Position
{

    private $_id;
    private $_parcelNumber;
    private $_latitude;
    private $_longitude;
    private $_date;

    /**
     * Position constructor.
     * @param array $donnees
     */
    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    /**
     * @param array $donnees
     */
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
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $id = (int)$id;

        if (is_int($id) && $id > 0) {
            $this->_id = $id;
        }


        //TODO implémenter else
    }

    /**
     * @return string
     */
    public function getParcelNumber()
    {
        return $this->_parcelNumber;
    }

    /**
     * @param string $parcelNumber
     */
    public function setParcelNumber($parcelNumber): void
    {
        $parcelNumber = (string)$parcelNumber;

        if (is_string($parcelNumber) && !empty($parcelNumber)) {
            $this->_parcelNumber = $parcelNumber;
        } else {
            $parcelNumber = 'C' . time();
            $this->_parcelNumber = $parcelNumber;

        }

    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->_latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude): void
    {

        $latitude = (float)$latitude;

        if (is_float($latitude)) {
            $this->_latitude = $latitude;
        }

        //TODO implémenter else

    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->_longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude): void
    {
        $longitude = (float)$longitude;

        if (is_float($longitude)) {
            $this->_longitude = $longitude;
        }

        //TODO implémenter else

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
        $this->_date = $date;

    }




}