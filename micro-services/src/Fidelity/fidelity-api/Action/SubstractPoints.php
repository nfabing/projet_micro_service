<?php


namespace App\Fidelity\Action;


use App\Fidelity\Card;
use App\Fidelity\CardManager;
use Exception;

require_once(__DIR__ . '/../Card.php');
require_once(__DIR__ . '/../CardManager.php');

class SubstractPoints
{

    /**
     * @param array $donnees
     * @throws Exception
     */
    public function __invoke(array $donnees) //$donnees = email, points a ajouter
    {
        try {
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

                //var_dump($card);
            }
        } catch (Exception $e) {
            $e->getMessage();
        }

    }
}