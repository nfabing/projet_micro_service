<?php


namespace App\Event\Action;


use App\Event\EventManager;
use Exception;

include_once(__DIR__ . '/../EventManager.php');


class RemoveEvent
{

    public function __invoke($id)
    {

        try {

            $manager = new EventManager();

            $manager->delete($id);


        } catch (Exception $e) {

            echo $e->getMessage();
        }


    }
}