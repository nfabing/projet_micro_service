<?php

namespace App\Controller;

use App\Delivery\Action\AddPosition;
use App\Delivery\Action\FetchAll;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Delivery\Client\DeliveryClient;
use Symfony\Component\HttpFoundation\JsonResponse;

require_once(__DIR__ . '/../Delivery/delivery-api/Action/FetchAll.php');
require_once(__DIR__ . '/../Delivery/delivery-api/Action/AddPosition.php');


class DeliveryController extends AbstractController
    /**
     * @Route("/delivery", name="delivery_")
     */

{

    /**
     * @Route("/all", name="fetch_all", methods={"GET"})
     */
    public function findAll()
    {
        $fetchall = new FetchAll();
        $positions = $fetchall();
        return new JsonResponse($positions);

    }

    /**
     * @Route("/add", name="add_new", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function addPosition(Request $request)
    {

        $parcelNumber = $request->query->get('parcelnumber');
        $lat = $request->query->get('latitude');
        $long = $request->query->get('longitude');

        $addpos = new AddPosition();
        $position = $addpos([
            'parcelNumber' => $parcelNumber,
            'longitude' => $long,
            'latitude' => $lat,
        ]);

        return new Response($position);

    }



    /**
     * @Route("/", name="delivery_find")
     *
    */
    public function find(): Response
    {
        return $this->render('delivery/delivery.html.twig');
    }

    /**
     * @Route("/new", name="delivery_form")
     *
*/
    public function form(): Response
    {
        return $this->render('delivery/addform.html.twig');
    }

    /**
     * @Route("/parcelnumber", name="delivery_Parcelnumber")
     * @param Request $request
     * @return Response
*/
    public function Parcelnumber(Request $request)
    {
        $parcelnumber = $request->query->get('parcelnumber');

        $client = new DeliveryClient();
        $positions = $client->getAll();

        return $this->render('delivery/getPosition.html.twig', [
            'position' => $positions,
        ]);
    }

    /**
     * @Route("/add",methods={"POST"}, name="delivery_addParcel")
*/
    public function addParcel()
    {
        //TODO: utiliser/modifier addPosition constructeur different si colis ext ou non
    }

}
