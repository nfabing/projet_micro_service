<?php


namespace App\Controller;
use App\Event\Action\AddEvent;
use App\Event\Action\FetchAll;
use App\Event\Action\RemoveEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Routing\Annotation\Route;

require_once(__DIR__ . '/../Event/event-api/Action/AddEvent.php');
require_once(__DIR__ . '/../Event/event-api/Action/FetchAll.php');
require_once(__DIR__ . '/../Event/event-api/Action/RemoveEvent.php');
require_once(__DIR__ . '/../Event/event-api/Action/UpdateEvent.php');

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
        return $this->render('events/eventadd.html.twig');
    }
    /**
     * @Route("/new", name="new", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
public function NewEvent(Request $request)
{
    $email = $request->query->get('email');
    $date = $request->query->get('date');
    $label = $request->query->get('label');
    $repeat = $request->query->get('repeat');
    $donnees=array("email"=>$email,"date"=>$date,"label"=>$label,"repeat"=>$repeat);
    $add = new AddEvent();
    $client = $add($donnees);
    return new JsonResponse($client);
}
    /**
     * @Route("/fetchevent", name="fetchpage", methods={"GET"})
     */
    public function Fetch()
    {
    return $this->render('events/eventfetch.html.twig');
    }
    /**
     * @Route("/fetch", name="fetch", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
public function FetchEvent(Request $request)
{
    $email = $request->query->get('email');
    $fetch = new FetchAll();
    $client = $fetch($email);


    return new JsonResponse($client);
}
    /**
     * @Route("/update", name="new", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function UpdateEvent(Request $request)
    {
        $email = $request->query->get('email');
        $fetch = new FetchAll();
        $client = $fetch($email);


        return new JsonResponse($client);
    }
    /**
     * @Route("/remove", name="new", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function RemoveEvent(Request $request)
    {
        $id = $request->query->get('id');
        $remove = new RemoveEvent();
        $client = $remove($id);
        return new JsonResponse($client);
    }
}
