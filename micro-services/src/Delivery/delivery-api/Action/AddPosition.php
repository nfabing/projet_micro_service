<?php


namespace App\Delivery\Action;

use App\Delivery\Position;
use App\Delivery\PositionManager;
use Exception;

require_once(__DIR__ . '/../Position.php');
require_once(__DIR__ . '/../PositionManager.php');

class AddPosition
{
    /**
     * @param array $params
     */
    public function __invoke(array $params) //params = parcelNumber, latitude, longitude
    {

        try {
            $position = new Position([
                'parcelNumber' => $params['parcelNumber'],
                'longitude' => $params['longitude'],
                'latitude' => $params['latitude']
            ]);

            $manager = new PositionManager();
            $exist = $manager->exist($position->getParcelNumber());
            $manager->add($position, $exist);

        } catch (Exception $e) {
            $e->getMessage();
        }


    }
}


