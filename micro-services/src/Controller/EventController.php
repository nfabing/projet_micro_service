<?php


namespace App\Controller;

use App\Event\Action\AddEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
    /**
     * @Route("/event", name="event_")
     */
{
    /**
     * @Route("/add/{email}_{date}_{label}_{repeat}", name="add")
     */
public function Add(string $email,string $date,string $label,int $repeat): Response
{
 return new Response("Evenement Crée: Date: $date, Main: $email, Label: $label, Répétition: $repeat");
}
}
