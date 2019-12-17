<?php

//TEST UNIQUEMENT
use App\Fidelity\Action\addCard;


include_once(__DIR__ . '..\Action\AddCard.php');

$add = new addCard();
$return = $add('nicolasfabing@gmail.com');

