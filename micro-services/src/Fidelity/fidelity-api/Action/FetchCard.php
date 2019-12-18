<?php


namespace App\Fidelity\Action;


use App\Fidelity\CardManager;
use Exception;

require_once(__DIR__ . '/../CardManager.php');


class FetchCard
{

    /**
     * @param $email
     * @return array
     */
    public function __invoke($email)
    {
        try {
            $manager = new CardManager();

            $count = $manager->exist($email);

            if ($count == true) {
                $card = $manager->get($email);
                return $card;

            } else {

                throw new Exception('Aucun email correspondant');

            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

}