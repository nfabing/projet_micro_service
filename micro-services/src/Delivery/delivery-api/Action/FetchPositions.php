<?php


namespace App\Delivery\Action;

use App\Delivery\PositionManager;
use Exception;

require_once(__DIR__ . '/../PositionManager.php');

class FetchPositions
{
    /**
     * @param $params
     * @return array
     */
    public function __invoke($params) //params = parcelNumber
    {
        try {
            if (isset($params)) {
                $manager = new PositionManager();
                $count = $manager->exist($params);

                // var_dump($count);

                if ($count == true) {

                    $positions = $manager->get($params);

                    return $positions; //return array

                }

            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }


    }


}