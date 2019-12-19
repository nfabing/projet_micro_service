<?php


namespace Delivery\Client;


use GuzzleHttp\Client;



class DeliveryClient extends Client
{


    /**
     * @param string $parcelnumber
     * @return array
     */
    public function getPosition(string $parcelnumber): array
    {
        $client = new Client(['base_uri' => '/delivery/micro-services/public/']);

        $response = $client->request('GET', 'delivery/findParcel?parcelnumber=' . $parcelnumber);
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
        $client = new Client(['base_uri' => '/delivery/micro-services/public/']);

        $response = $client->request('GET', 'delivery/all');
        $positions = $response->getBody();
        $positions = json_decode($positions, true);

        return $positions;
    }

    public function addPosition(string $parcelnumber, string $Longitude, string $Latitude)
    {
        $client = new Client(['base_uri' => '/delivery/micro-services/public/']);

        $response = $client->request('GET', 'delivery/addPosition?parcelnumber=' . $parcelnumber . '&latitude=' . $Latitude . '&longitude=' . $Longitude);

        $p_number = $response->getBody();

        $p_number = json_decode($p_number, true);

    }

    public function newPosition( string $Latitude, string $Longitude, string $date): string
    {

    }

}