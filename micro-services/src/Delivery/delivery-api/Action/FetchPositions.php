<?php


namespace App\Delivery;

require_once(__DIR__ . '\..\PositionManager.php');

class FetchPositions
{
    /**
     * @param $params
     * @return array
     */
    public function __invoke($params) //params = parcelNumber
    {
        if (isset($params)) {
            $manager = new PositionManager();
            $count = $manager->exist($params);

            // var_dump($count);

            if ($count == true) {

                $positions = $manager->get($params);

                return $positions; //return array

            }
        }

    }


}