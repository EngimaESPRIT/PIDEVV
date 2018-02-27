<?php
/**
 * Created by PhpStorm.
 * User: reaper
 * Date: 07/02/2017
 * Time: 23:48
 */

namespace GestionMatchBundle\Controller;


use GestionMatchBundle\Entity\event;
use GestionMatchBundle\Entity\ticket;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class ticketController extends Controller
{
    public function showeventsAction(){



        $events = $this->getDoctrine()
            ->getManager()
            ->createQuery('SELECT e FROM GestionMatchBundle:events e WHERE e.startdate>= CURRENT_DATE() AND e.enable = 1')
            ->getResult();

        return $this->render('GestionMatchBundle:event:eventtake.html.twig',array('events'=>$events));

    }




    public function takeeventAction($id){

        $ticket = new ticket();
        $session = new Session();
       if(! $session->isStarted()){

       }


        $em=$this->getDoctrine()->getManager();

        $event= $this->get('doctrine.orm.entity_manager')
            ->getRepository('GestionMatchBundle:events')
            ->find($id);
        $NBT=$event->getTickets()->count();


        if($event->getTickets()->count() < $event->getNbplaces()){
        $ticket->setEvent($event);
            $event->setNbrPlaceToken($NBT);

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $ticket->setIduser($user);
        $event->addTicket($ticket);


        $em->persist($ticket);
            $session->getFlashBag()->add('success', 'Ticket added');

        $em->flush();

        }
        else{
            $session->getFlashBag()->add('danger', 'Ticket Count is exeeded');

        }

        return $this->redirect($this->generateUrl('showevents'));

    }

    public function TicketshowAction(){

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em=$this->getDoctrine()->getManager();
        $tickets=$em->getRepository('GestionMatchBundle:ticket')->findBy(array('iduser' => $user));



        return $this->render('GestionMatchBundle:ticket:showtickets.html.twig',array('tickets'=>$tickets));

    }
}