<?php


namespace App\Delivery;


class Position
{
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


}