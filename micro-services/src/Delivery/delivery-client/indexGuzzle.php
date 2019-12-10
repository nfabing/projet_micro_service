<?php

require_once('../../../vendor/autoload.php');

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'http://localhost/delivery/micro-services/public/']);


//Test avec Guzzle avec envoie d'un parcelNumber. Ne fonctionne pas car je n'arrive pas faire la route qui appelle la class fetchPositions
//$positions contient un array avec les positions d'un colis

$parcelNumber = 'ABC';

try {
    $response = $client->request('POST', '/api/position/' . $parcelNumber);
    $positions = $response->getBody();
    var_dump($positions);

    foreach ($positions as $position) {
        echo $position['id'] . '<br>';
        echo $position['parcelNumber'] . '<br>';
        echo $position['latitude'] . '<br>';
        echo $position['longitude'] . '<br>';

        //var_dump($position);
    }


} catch (GuzzleException $e) {

    echo 'Erreur : ' . $e->getMessage();
}



