<?php


namespace Delivery\Client;

use App\Delivery\fetchAll;
use App\Delivery\fetchPositions;
use GuzzleHttp\Client;

include_once(__DIR__.'/../delivery-api/Action/fetchAll.php');
include_once(__DIR__.'/../delivery-api/Action/fetchPositions.php');

class DeliveryClient extends Client
{
    /**
     * @param string $parcelnumber
     * @return array
     */
    public function getPosition(string $parcelnumber): array
    {
        $obj = new fetchPositions();
        $position = $obj($parcelnumber);

        return $position;
    }

    /**
     * @return array
     */
    public function getAllPosition(): array
    {
        $obj = new fetchAll;
        $position = $obj();

        return $position;
    }

    public function addPosition(string $nColis, string $Latitude, string $Longitude, string $date): string
    {

    }

    public function newPosition( string $Latitude, string $Longitude, string $date): string
    {

    }

}