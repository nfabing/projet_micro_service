<?php

namespace App\Controller;





use App\Delivery\Action\AddPosition as Add_pos;
use App\Delivery\Action\FetchAll;
use App\Delivery\Action\FetchPositions as f_pos;
use Delivery\Client\DeliveryClient;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

require_once(__DIR__ . '/../Delivery/delivery-api/Action/FetchAll.php');
require_once(__DIR__ . '/../Delivery/delivery-api/Action/FetchPositions.php');
require_once(__DIR__ . '/../Delivery/delivery-api/Action/AddPosition.php');


class DeliveryController extends AbstractController
    /**
     * @Route("/Delivery", name="delivery_")
     */
{
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
        $positions = $client->getPosition($parcelnumber);

        return $this->render('delivery/getPosition.html.twig', [
            'position' => $positions,
        ]);
    }



    /**
     * @Route("/addtest", name="add_new", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function addTest(Request $request)
    {

        $parcelNumber = $request->request->get('parcelnumber');
        $lat = $request->request->get('latitude');
        $long = $request->request->get('longitude');

        $addpos = new Add_pos();
        $p_Num = $addpos([
            'parcelNumber' => $parcelNumber,
            'longitude' => $long,
            'latitude' => $lat,
        ]);

        return new Response("<br><br> POSITION AJOUTER ! <br> Numéro de colis : ".$p_Num);

    }




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
     * @Route("/findParcel", name="fetch_all", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function findParcel(Request $request)
    {
        $parcelnumber = $request->query->get('parcelnumber');

        $fetchpositions = new f_pos();
        $positions = $fetchpositions($parcelnumber);
        return new JsonResponse($positions);

    }


    /*
     * @Route("/add",methods={"POST"}, name="delivery_addParcel")

    public function addParcel(Request $request)
    {
        $parcelnumber = $request->request->get('parcelnumber');
        if(empty($parcelnumber))$parcelnumber='null';
        $longitude = $request->request->get('longitude');
        $latitude = $request->request->get('latitude');
        $client = new DeliveryClient();
        $p_number = $client->addPosition($parcelnumber,$longitude,$latitude);


        return $this->render('delivery/addPosition.html.twig', [
'parcelnumber'=>$p_number,
        ]);
    }
        *
     * @Route("/addPosition",methods={"GET"}, name="delivery_addPosition")
     * @param Request $request
     * @return JsonResponse

    public function addPosition(Request $request)
    {


        $parcelNumber = $request->query->get('parcelnumber');
        if ($parcelNumber == 'null')$parcelNumber='';
        $lat = $request->query->get('latitude');
        $long = $request->query->get('longitude');

        $addpos = new Add_pos();
        $P_number = $addpos([
            'parcelNumber' => $parcelNumber,
            'longitude' => $long,
            'latitude' => $lat,
        ]);

        return new JsonResponse($P_number);
    }*/
}
