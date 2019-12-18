<?php

//TEST UNIQUEMENT

use App\Event\Action\UpdateEvent;

require_once(__DIR__ . '/../Action/UpdateEvent.php');


$id = 5;
$email = 'nicofabing@gmail.com';
$date = '2019-12-20 18:00:00';
$label = 'Acheter du lait';
$repeatday = 7;

$event = new UpdateEvent();
$event([
    'id' => $id,
    'email' => $email,
    'date' => $date,
    'label' => $label,
    'repeat' => $repeatday,
]);