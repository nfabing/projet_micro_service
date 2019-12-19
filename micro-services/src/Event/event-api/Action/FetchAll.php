<?php


namespace App\Event\Action;

use App\Event\EventManager as EventManager;

include_once(__DIR__ . '/../EventManager.php');

class FetchAll
{

    /**
     * @param $email
     * @return array
     */
    public function __invoke($email) //$info = email
    {
        if (!empty($email)) {
            $manager = new EventManager();

            $exist = $manager->exist($email);

            if ($exist == true) {
                $events = $manager->get($email);

                return $events;

            } else {
                echo 'ERREUR';
            }
        }
        //TODO
    }
}