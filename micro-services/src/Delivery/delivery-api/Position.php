<?php


namespace App\Delivery;


use Exception;

require_once(__DIR__ . '/Hydrate.php');

class Position extends Hydrate
{

    //attributs
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
     * @throws Exception
     */
    public function setLatitude($latitude): void
    {

        $latitude = (float)$latitude;

        if (is_float($latitude)) {
            $this->_latitude = $latitude;
        } else {
            throw new Exception('Latitude non valide');
        }

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
     * @throws Exception
     */
    public function setLongitude($longitude): void
    {
        $longitude = (float)$longitude;

        if (is_float($longitude)) {
            $this->_longitude = $longitude;
        } else {
            throw new Exception('Longitude non valide');
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
        $this->_date = $date;

    }


}