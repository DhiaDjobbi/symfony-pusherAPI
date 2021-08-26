<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $session = new Session();
        $session->start();
    
        $visitorCount = $session->get('visitorCount') ?: 0;
        
        return $this->render('home/index.html.twig', [
            'pusherKey' => $this->getParameter('pusherKey'),
            'pusherCluster' => $this->getParameter('pusherCluster'),
            'visitorCount' => $visitorCount,
        ]);
    }
}
