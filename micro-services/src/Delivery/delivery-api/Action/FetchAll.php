<?php


namespace App\Delivery;

include_once(__DIR__.'/../PositionManager.php');

class FetchAll
{
    /**
     * @var array
     */
private $position;

    /**
     * @return array
     */
    public function getPosition(): array
    {
        return $this->position;
    }

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