<?php

//TEST UNIQUEMENT

use App\Event\Action\AddEvent;

require_once(__DIR__ . '/../Action/AddEvent.php');


$email = 'yanis@gmail.com';
$date = '2019-12-15 15:00:00';
$label = 'Aller chez le coiffeur';
$repeat = 14;


$add = new AddEvent();
$add([
    'email' => $email,
    'date' => $date,
    'label' => $label,
    'repeat' => $repeat,
]);