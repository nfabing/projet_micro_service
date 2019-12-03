<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DeliveryController extends AbstractController
{
    //TODO: Route vers API (a tester en local)
    /**
     * @Route("/", name="main_homepage")
     */
    public function homepage()
    {
        return $this->render('delivery/delivery.html.twig', [
            'controller_name' => 'DeliveryController',
        ]);
    }


}
