<?php

use \App\Delivery\addPosition;
use \App\Delivery\fetchAll;
use \App\Delivery\fetchPositions;

include_once('Action\addPosition.php');
include_once('Action\fetchPositions.php');
include_once('Action\fetchAll.php');


//TEST UNIQUEMENT

//Ajout
if (isset($_GET['parcelnumber']) && isset($_GET['latitude']) && isset($_GET['longitude'])) {
    echo 'Ajout d\'une position avec comme paramètres : ' . $_GET['parcelnumber'] . ', ' . $_GET['latitude'] . ', ' . $_GET['longitude'] . '<br><br>';
    $obj = new addPosition();
    $obj([
        'parcelNumber' => $_GET['parcelnumber'],
        'latitude' => $_GET['latitude'],
        'longitude' => $_GET['longitude']
    ]); //__invoke


} //Recherche par parcelNumber
elseif (isset($_GET['parcelnumber'])) {
    echo 'Recherche positions de : ' . $_GET['parcelnumber'] . '<br>';
    $obj = new fetchPositions();
    $positions = $obj($_GET['parcelnumber']); //__invoke

    foreach ($positions as $position) {
        echo $position['id'] . '<br>';
        echo $position['parcelNumber'] . '<br>';
        //var_dump($position);
    }
} //recherche tout
else {
    echo 'Recherche toutes les positions <br>';
    $obj = new fetchAll();
    $positions = $obj();

    foreach ($positions as $position) {
        echo $position['id'] . '<br>';
        echo $position['parcelNumber'] . '<br>';
        //var_dump($position);
    }
}



