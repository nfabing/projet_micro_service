<?php


namespace App\Event\Action;


use App\Event\Event;
use App\Event\EventManager;
use Exception;

include_once(__DIR__ . '/../Event.php');
include_once(__DIR__ . '/../EventManager.php');

class UpdateEvent
{

    /**
     * @param array $donnees
     */
    public function __invoke(array $donnees)
    {
        try {
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
                throw new Exception('Erreur votre requête n\'a pas abouti !');
            } else {
                echo 'Evénement modifié avec succès !';
            }

        } catch (Exception $e) {

            echo $e->getMessage();
        }


    }

}