<?php

namespace App\Controller;




use App\Delivery\fetchAll;
use Delivery\Client\DeliveryClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



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
     * @Route("/add",methods={"POST"}, name="delivery_addParcel")
     */
    public function addParcel()
    {
        //TODO: utiliser/modifier addPosition constructeur different si colis ext ou non
    }

}
