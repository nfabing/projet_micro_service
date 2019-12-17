<?php

//TEST UNIQUEMENT

use App\Fidelity\Action\fetchCard;

include_once(__DIR__ . '..\Action\FetchCard.php');

$fetch = new fetchCard();
$return = $fetch('nicofabing@gmail.com');


echo $return['email'] . '<br>';
echo $return['number'];
//var_dump($return);