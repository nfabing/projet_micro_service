<?php


namespace App\Delivery;

use Exception;

require_once(__DIR__ . '\..\PositionManager.php');


class FetchAll
{

    /**
     * @return array
     */
    public function __invoke()
    {
        try {
            $manager = new PositionManager();
            $positions = $manager->getList();

            return $positions;

        } catch (Exception $e) {
            $e->getMessage();
        }

    }
}



