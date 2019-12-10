<?php


namespace App\Fidelity\Action;


use App\Fidelity\CardManager;

require_once('CardManager.php');


class fetchCard
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