t<?php

//TEST UNIQUEMENT
use App\Fidelity\Action\substractPoints;


include_once(__DIR__ . '..\Action\substractPoints.php');

$substract = new substractPoints();
$return = $substract([
    'email' => 'nicofabing@gmail.com',
    'number' => 100,
]);

