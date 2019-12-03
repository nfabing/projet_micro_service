<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DeliveryController extends AbstractController
{
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
