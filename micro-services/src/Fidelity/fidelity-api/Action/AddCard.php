<?php


namespace App\Fidelity\Action;

use App\Fidelity\CardManager;
use App\Fidelity\Card;
use Exception;

require_once(__DIR__ . '/../Card.php');
require_once(__DIR__ . '/../CardManager.php');

class AddCard
{
    /**
     * @param $email
     */
    public function __invoke($email)
    {
        try {
            $card = new Card([
                'email' => $email,
            ]);

            $manager = new CardManager();
            $count = $manager->exist($card->getEmail());
            if ($count == false) {

                $manager->add($card);

                var_dump($card);

            } else {
                throw new Exception('Un compte avec ce email existe déja !');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}