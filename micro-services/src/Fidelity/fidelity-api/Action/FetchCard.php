<?php


namespace App\Fidelity\Action;


use App\Fidelity\CardManager;

require_once(__DIR__ . '/../CardManager.php');


class FetchCard
{

    /**
     * @param $email
     * @return array
     */
    public function __invoke($email)
    {
        $manager = new CardManager();

        $count = $manager->exist($email);

        if ($count == true) {
            $card = $manager->get($email);
            return $card;

        } else {

            echo 'Aucun email correspondant';
        }

    }

}