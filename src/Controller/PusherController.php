<?php

namespace App\Controller;

use Pusher\Pusher;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PusherController extends AbstractController
{
    /**
     * @Route("/webhook", name="pusher")
     */
    public function webhook(Pusher $pusher): Response
    {
        $options = array(
            'cluster' => $this->getParameter('pusherCluster'),
            'useTLS' => true
          );
          $pusher = new Pusher(
             $this->getParameter('pusherKey'),
             $this->getParameter('pusherSecret'),
             $this->getParameter('appID'),
            $options
          );
        
          $data['message'] = 'ccccccccccccccccccc';
          $pusher->trigger('lol', 'update', $data);

        return new Response();
    }
}
