<?php


namespace App\Delivery;


require_once(__DIR__ . '/../Position.php');
require_once(__DIR__ . '/../PositionManager.php');

class AddPosition
{
    /**
     * @param array $params
     */
    public function __invoke(array $params) //params = parcelNumber, latitude, longitude
    {

        $position = new Position([
            'parcelNumber' => $params['parcelNumber'],
            'longitude' => $params['longitude'],
            'latitude' => $params['latitude']
        ]);

        $manager = new PositionManager();
        $exist = $manager->exist($position->getParcelNumber());
        $manager->add($position, $exist);

    }
}


