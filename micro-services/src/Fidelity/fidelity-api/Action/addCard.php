<?php


namespace App\Fidelity\Action;

use App\Fidelity\CardManager;
use App\Fidelity\Card;

require_once('Card.php');
require_once('CardManager.php');

class addCard
{
    /**
     * @param $email
     */
    public function __invoke($email)
    {
        $card = new Card([
            'email' => $email,
        ]);

        $manager = new CardManager();
        $count = $manager->exist($card->getEmail());
        if ($count == false) {

            $manager->add($card);

            // var_dump($card);

        } else {
            echo 'Un compte avec ce email existe déja !';
        }
    }
}