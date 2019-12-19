<?php


namespace Delivery\Client;

//use App\Delivery\fetchAll;
//use App\Delivery\fetchPositions;
use GuzzleHttp\Client;

//include_once(__DIR__.'/../delivery-api/Action/fetchAll.php');
//include_once(__DIR__.'/../delivery-api/Action/fetchPositions.php');

class DeliveryClient extends Client
{
    /**
     * @param string $parcelnumber
     * @return array
     */
    public function getPosition(string $parcelnumber): array
    {
        $client = new Client(['base_uri' => 'http://localhost:8888/TESTProjet/Microservice/public/']);

        $response = $client->request('GET', 'Delivery/findParcel?parcelnumber='.$parcelnumber);
        $positions = $response->getBody();
        $positions = json_decode($positions, true);

        return $positions;
    }

    /**
     * @return array
     */
    public function getAllPosition(): array
    {
      /*  $obj = new fetchAll;
        $position = $obj();

        return $position;*/
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $client = new Client(['base_uri' => 'http://localhost:8888/TESTProjet/Microservice/public/']);

        $response = $client->request('GET', 'Delivery/all');
        $positions = $response->getBody();
        $positions = json_decode($positions, true);

        return $positions;
    }

    public function addPosition(string $parcelnumber, string $Longitude, string $Latitude)
    {
        $client = new Client(['base_uri' => 'http://localhost:8888/TESTProjet/Microservice/public/']);

        $response = $client->request('GET', 'Delivery/addPosition?parcelnumber='.$parcelnumber.'&latitude='.$Latitude.'&longitude='.$Longitude);

        $p_number = $response->getBody();

        $p_number = json_decode($p_number, true);

    }

    public function newPosition( string $Latitude, string $Longitude, string $date): string
    {

    }

}