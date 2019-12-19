<?php

require_once('../../../vendor/autoload.php');

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

echo "test";
$client = new Client(['base_uri' => 'http://localhost:8888/TESTProjet/Microservice/public/']);


//Test avec Guzzle avec envoie d'un parcelNumber. Ne fonctionne pas car je n'arrive pas faire la route qui appelle la class fetchPositions
////$positions contient un array avec les positions d'un colis

echo "test";
    $response = $client->request('GET', 'Delivery/all');
    var_dump($response);
echo "test";

    $positions = $response->getBody();
    var_dump($positions);
echo "test";

    //$positions = json_decode($positions,true);
    //var_dump($positions);

    foreach ($positions as $position) {
        echo $position['id'] . '<br>';
        echo $position['parcelNumber'] . '<br>';
        echo $position['latitude'] . '<br>';
        echo $position['longitude'] . '<br>';
    }
        //var_dump($position);






