<?php

//TEST UNIQUEMENT
use App\Fidelity\Action\substractPoints;


include_once('Action\substractPoints.php');

$substract = new substractPoints();
$return = $substract([
    'email' => 'nicofabing@gmail.com',
    'number' => 100,
]);

