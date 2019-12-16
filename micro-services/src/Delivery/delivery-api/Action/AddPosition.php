<?php


namespace App\Delivery;


require_once('Position.php');
require_once('PositionManager.php');

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

        //var_dump($position);

        $manager = new PositionManager();
        $manager->add($position);


    }
}


