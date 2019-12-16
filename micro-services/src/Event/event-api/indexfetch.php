<?php


//TEST UNIQUEMENT

use App\Event\Action\FetchAll;

include_once('Action\FetchAll.php');

$email = 'yanis@gmail.com';

$fetch = new FetchAll();
$events = $fetch($email);

if (!empty($events)) {
    foreach ($events as $event) {

        echo $event['email'] . '<br>';
        echo $event['date'] . '<br>';
        echo $event['label'] . '<br>';
        echo $event['repeatday'] . '<br><br>';
    }
} else {
    echo 'ERREUR';
}
