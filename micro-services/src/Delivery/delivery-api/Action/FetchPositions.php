<?php


namespace App\Delivery;

require_once('PositionManager.php');

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

            if ($count > 0) {
                $positions = $manager->get($params);

                return $positions; //return array

            }
        }

    }


}