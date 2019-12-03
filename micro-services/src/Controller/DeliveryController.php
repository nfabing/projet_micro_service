<?php

namespace App\Controller;

use App\Action\GetPosition;
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
        return [
            'controller_name' => 'DeliveryController',
            'path' => '/api/delivery/retrieve',
            'method' => 'POST',
            'action' => GetPosition::class
        ];
    }


}
