<?php

use \App\Delivery\AddPosition;
use \App\Delivery\FetchAll;
use \App\Delivery\FetchPositions;

include_once('Action\AddPosition.php');
include_once('Action\FetchPositions.php');
include_once('Action\FetchAll.php');


//TEST UNIQUEMENT

//Ajout
if (isset($_GET['parcelnumber']) && isset($_GET['latitude']) && isset($_GET['longitude'])) {
    echo 'Ajout d\'une position avec comme paramètres : ' . $_GET['parcelnumber'] . ', ' . $_GET['latitude'] . ', ' . $_GET['longitude'] . '<br><br>';
    $obj = new AddPosition();
    $obj([
        'parcelNumber' => $_GET['parcelnumber'],
        'latitude' => $_GET['latitude'],
        'longitude' => $_GET['longitude']
    ]); //__invoke


} //Recherche par parcelNumber
elseif (isset($_GET['parcelnumber'])) {
    echo 'Recherche positions de : ' . $_GET['parcelnumber'] . '<br>';
    $obj = new FetchPositions();
    $positions = $obj($_GET['parcelnumber']); //__invoke

    foreach ($positions as $position) {
        echo $position['id'] . '<br>';
        echo $position['parcelNumber'] . '<br>';
        //var_dump($position);
    }
} //recherche tout
else {
    echo 'Recherche toutes les positions <br>';
    $obj = new FetchAll();
    $positions = $obj();

    foreach ($positions as $position) {
        echo $position['id'] . '<br>';
        echo $position['parcelNumber'] . '<br>';
        //var_dump($position);
    }
}



