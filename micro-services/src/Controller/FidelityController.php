<?php


namespace App\Controller;


use App\Fidelity\Action\AddCard;
use App\Fidelity\Action\AddPoints;
use App\Fidelity\Action\fetchCard;

use App\Fidelity\Action\SubstractPoints;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once(__DIR__ . '/../Fidelity/fidelity-api/Action/FetchCard.php');
require_once(__DIR__ . '/../Fidelity/fidelity-api/Action/AddPoints.php');
require_once(__DIR__ . '/../Fidelity/fidelity-api/Action/SubstractPoints.php');
require_once(__DIR__ . '/../Fidelity/fidelity-api/Action/AddCard.php');

class FidelityController extends AbstractController
    /**
     * @Route("/fidelity", name="fidelity_")
     */
{

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('fidelity/index.html.twig');
    }


    /**
     * @Route("/new", name="new", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function newCard(Request $request)
    {
        $email = $request->query->get('email');
        $card = new AddCard();
        $client = $card($email);

        return new JsonResponse($client);

    }

    /**
     * @Route("/fetch", name="fetch_", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function fetchCard(Request $request)
    {

        $email = $request->request->get('email');
        $fetch = new fetchCard();
        $client = $fetch($email);

        if (isset($client['email']) && isset($client['number'])) {
            return $this->render('fidelity/boutique.html.twig', array(
                'client' => array(
                    'email' => $client['email'],
                    'number' => $client['number'],
                ),
            ));
        }

        return $this->render('fidelity/index.html.twig', array(
            'data' => array(
                'erreur' => 'Compte inexistant !',
            ),
        ));
    }

    /**
     * @Route("/add", name="add", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function addPoints(Request $request)
    {
        $email = $request->query->get('email');
        $number = $request->query->get('number');

        $points = new AddPoints();
        $point = $points([
            'email' => $email,
            'number' => $number,
        ]);

        return new JsonResponse($point);
    }

    /**
     * @Route("/substract", name="substract", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function substractPoints(Request $request)
    {
        $email = $request->query->get('email');
        $number = $request->query->get('number');

        $points = new SubstractPoints();
        $point = $points([
            'email' => $email,
            'number' => $number,
        ]);

        return new JsonResponse($point);

    }


}