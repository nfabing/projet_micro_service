<?php


namespace App\Event\Action;


use App\Event\Event;
use App\Event\EventManager;

include_once('Event.php');
include_once('EventManager.php');

class UpdateEvent
{

    /**
     * @param array $donnees
     */
    public function __invoke(array $donnees)
    {

        $event = new Event([
            'id' => $donnees['id'],
            'email' => $donnees['email'],
            'date' => $donnees['date'],
            'label' => $donnees['label'],
            'repeat' => $donnees['repeat'],
        ]);


        $manager = new EventManager();
        $result = $manager->update($event);
        if ($result == false) {
            echo 'Erreur votre requête n\'a pas abouti !';
        } else {
            echo 'Evénement modifié avec succès !';
        }
    }

}