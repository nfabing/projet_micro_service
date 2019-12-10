<?php


namespace App\Delivery;

require_once('PositionManager.php');

class fetchAll
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