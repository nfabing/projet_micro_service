<?php


namespace App\Event\Action;


use App\Event\Event;
use App\Event\EventManager;

include_once(__DIR__. '/../Event.php');
include_once(__DIR__. '/../EventManager.php');

class AddEvent
{
    /**
     * @param array $donnees
     */
    public function __invoke(array $donnees)
    {
        if (!empty($donnees)) {

            $manager = new EventManager();

            $event = new Event([
                'email' => $donnees['email'],
                'date' => $donnees['date'],
                'label' => $donnees['label'],
                'repeat' => $donnees['repeat'],
            ]);


            $result = $manager->add($event);
            if ($result == false) {
                echo 'Erreur votre requête n\'a pas abouti';
                var_dump($event);

            } else {
                echo 'Evénement ajouter ! <br>';
                var_dump($event);
            }
        }
        //TODO
    }

}