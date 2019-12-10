<?php

//TEST UNIQUEMENT
use App\Fidelity\Action\addCard;


include_once('Action\addCard.php');

$add = new addCard();
$return = $add('nicolasfabing@gmail.com');

