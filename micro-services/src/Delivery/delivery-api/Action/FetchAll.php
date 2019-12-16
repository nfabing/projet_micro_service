<?php


namespace App\Delivery;

require_once('PositionManager.php');

class FetchAll
{

    /**
     * @return array
     */
    public function __invoke()
    {
        $manager = new PositionManager();
        $positions = $manager->getList();

        return $positions;
    }
}