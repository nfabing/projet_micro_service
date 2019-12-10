<?php


namespace App\Fidelity\Action;


use App\Fidelity\Card;
use App\Fidelity\CardManager;

require_once('Card.php');
require_once('CardManager.php');

class substractPoints
{

    /**
     * @param array $donnees
     */
    public function __invoke(array $donnees) //$donnees = email, points a ajouter
    {

        $manager = new CardManager();
        $exist = $manager->exist($donnees['email']);

        if ($exist == true) {
            $donneesCard = $manager->get($donnees['email']);

            $card = new Card([
                'email' => $donneesCard['email'],
                'number' => $donneesCard['number'],
            ]);

            $card->substractPoints($donnees['number']);
            $manager->update($card);

            var_dump($card);
        }
    }
}