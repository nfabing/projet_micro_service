<?php

//TEST UNIQUEMENT
use App\Fidelity\Action\addPoints;


include_once('Action\addPoints.php');

$add = new addPoints();
$return = $add([
    'email' => 'nicofabing@gmail.com',
    'number' => 100,
]);

