<?php


namespace App\Event\Action;


use App\Event\Event;
use App\Event\EventManager;

include_once('Event.php');
include_once('EventManager.php');

class addEvent
{

    public function __invoke(array $donnees)
    {
        if (!empty($donnees)) {

            $event = new Event([
                'email' => $donnees['email'],
                'date' => $donnees['date'],
                'label' => $donnees['label'],
                'repeat' => $donnees['repeat'],
            ]);

            $manager = new EventManager();

            $exist = $manager->exist($event->getEmail());
            if ($exist == false) {
                $result = $manager->add($event);
                if ($result == false) {
                    echo 'Erreur votre requête n\'a pas abouti';
                    var_dump($event);

                } else {
                    echo 'Evénement ajouter !';
                }
            } else {
                echo 'Evénement avec cette email déja existant ! ';
            }
        }

    }
}