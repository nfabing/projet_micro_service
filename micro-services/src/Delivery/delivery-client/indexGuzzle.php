<?php

require_once('../../../vendor/autoload.php');

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


$client = new Client(['base_uri' => 'http://localhost/delivery/micro-services/public/']);


$response = $client->request('GET', 'delivery/all');
$positions = $response->getBody();
$positions = json_decode($positions, true);


foreach ($positions as $position) {
    echo $position['parcelNumber'] . '<br>';
    echo $position['latitude'] . '<br>';
    echo $position['longitude'] . '<br><br>';

    //var_dump($position);
}







