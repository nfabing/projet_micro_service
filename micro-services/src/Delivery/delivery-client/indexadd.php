<?php

require_once('../../../vendor/autoload.php');

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

$parcelNumber = 'LUCAS';
$longitude = '9.25';
$latitude = '10.2';
$client = new Client(['base_uri' => 'http://localhost/delivery/micro-services/public/']);

$response = $client->request('GET', 'delivery/add?parcelnumber=' . $parcelNumber . '&latitude=' . $latitude . '&longitude=' . $longitude);
echo $positions = $response->getBody();









