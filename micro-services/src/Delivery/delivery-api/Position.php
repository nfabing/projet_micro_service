<?php


namespace App\Delivery;


class Position
{

    /**
     * Position constructor.
     * @param int $id
     * @param string $parcelNumber
     * @param string $adresse
     * @param float $latitude
     * @param float $longitude
     * @param \DateTime $date
     */
    public function __construct(int $id, string $parcelNumber, string $adresse, float $latitude, float $longitude, \DateTime $date)
    {
        $this->id = $id;
        $this->parcelNumber = $parcelNumber;
        $this->adresse = $adresse;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->date = $date;
    }


    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $parcelNumber;

    /**
     * @var string
     */
    protected $adresse;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var \DateTime
     */
    protected $date;


    //Getters Setters


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getParcelNumber(): string
    {
        return $this->parcelNumber;
    }

    /**
     * @param string $parcelNumber
     */
    public function setParcelNumber(string $parcelNumber): void
    {
        $this->parcelNumber = $parcelNumber;
    }

    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }


}