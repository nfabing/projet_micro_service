<?php


namespace App\Controller;
use App\Event\Action\AddEvent;
use App\Event\Action\FetchAll;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Routing\Annotation\Route;

require_once(__DIR__ . '/../Event/event-api/Action/AddEvent.php');
require_once(__DIR__ . '/../Event/event-api/Action/FetchAll.php');

class EventController extends AbstractController
    /**
     * @Route("/event", name="event_")
     */
{
    /**
     * @Route("/debug", name="debug")
     */
    public function Debug()
    {
        return $this->render('events/eventdebug.html.twig');
    }
    /**
     * @Route("/home", name="home")
     */
    public function Home()
    {
        return $this->render('events/eventhome.html.twig');
    }
    /**
     * @Route("/add", name="add")
     */
    public function Add(): Response
    {
        return $this->render('events/eventapp.html.twig');
    }
    /**
     * @Route("/new/{email}_{date}_{label}_{repeat}", name="new")
     */
public function NewEvent(string $email,string $date,string $label,int $repeat)
{
    $fixedemail=str_replace("|",".",$email);
    $donnees=array("email"=>$email,"date"=>$date,"label"=>$label,"repeat"=>$repeat);
    $add = new AddEvent();
    $client = $add($donnees);
    return new Response("Evenement Crée: Date: $date, Mail: $email, Label: $label, Répétition: $repeat");
}
    /**
     * @Route("/fetchevent", name="fetchpage", methods={"GET"})
     */
    public function Fetch()
    {
    return $this->render('events/eventfetch.html.twig');
    }
    /**
     * @Route("/fetch/{email}", name="fetch", methods={"GET"})
     */
public function FetchEvent(string $email)
{
    $fixedemail=str_replace("|",".",$email);
    $fetch = new FetchAll();
    $client = $fetch($fixedemail);


    return new JsonResponse($client);
}
}
