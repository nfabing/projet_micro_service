<?php


use App\Event\Action\addEvent;

include_once('Action\addEvent.php');


$email = 'yanis@gmail.com';
$date = '2019-12-15 15:00:00';
$label = 'Aller chez le coiffeur';
$repeat = 14;


$add = new addEvent();
$add([
    'email' => $email,
    'date' => $date,
    'label' => $label,
    'repeat' => $repeat,
]);