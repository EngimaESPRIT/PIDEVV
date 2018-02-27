<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02/02/2017
 * Time: 19:50
 */

namespace GestionMatchBundle\Controller;


use GestionMatchBundle\Entity\events;
use GestionMatchBundle\Entity\ticket;
use GestionMatchBundle\Form\eventsType;
use MyApp\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class eventController extends Controller
{
    public function eventAction()
    {
        //$event = new event();
        $event = new events();
        $form = $this->get('form.factory')->create(eventsType::class, $event, []);

        //$user = $this->get('security.token_storage')->getToken()->getUser();
        $user = new User();
        $user->setId(2);
        $events = $this->get('doctrine.orm.entity_manager')
            ->getRepository('GestionMatchBundle:events')
            ->findBy([
                'iduser' => $user
            ]);



        return $this->render('GestionMatchBundle:event:event.html.twig', [
            'form' => $form->createView(),
            'events' => $events
        ]);

    }




    public function newEventAction(Request $request)
    {
        var_dump("");
        echo ("azaz11111112");


        $event = new events();
        /** @var Form $form */
        $form = $this->get('form.factory')->create(eventsType::class, $event, []);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->get('security.token_storage')->getToken()->getUser();


            /** @var events $event */
            $event = $form->getData();
            $event->setIduser($user);
            $em = $this->getDoctrine()->getManager();

            $em->persist($event);

            $em->flush();;

            return $this->json($event);
        }

        return $this->json([
            'status' => 'error'
        ]);
    }
    public function RenderEventAction(){
        $em=$this->getDoctrine()->getManager();
        $events = $em->getRepository("GestionMatchBundle:events")->findAll();
        return $this->json($events);
    }

    public function updateEventAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $event=$em->getRepository('GestionMatchBundle:events')->find($id);

        /** @var Form $form */
        $form = $this->get('form.factory')->create(eventsType::class, $event, []);
        $form->remove('title');
        $form->remove('price');
        $form->remove('nbplaces');


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            /** @var events $event */
            $event = $form->getData();

            $em->persist($event);
            $em->flush();

            return $this->json($event);
        }

        return $this->json([
            'status' => 'error'
        ]);
    }

    public function deleteEventAction($id){

        $em=$this->getDoctrine()->getManager();

        $event=$em->getRepository('GestionMatchBundle:events')->find($id);
        $em->remove($event);
        $em->flush();

        return $this->redirectToRoute('event');
    }

    //admin part



    public function eventadminAction()
    {
        $em=$this->getDoctrine()->getManager();
        $events = $em->getRepository("GestionMatchBundle:events")->findAll();

        return $this->render("@GestionMatch/Admin/events_admin.html.twig",array('events'=>$events));
    }
    public function BlockEventAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $event=$em->getRepository('GestionMatchBundle:events')->find($id);
        $event->setEnable(0);
        $em->persist($event);
        $em->flush();

        return $this->redirectToRoute('events_admin');
    }
    public function ActivateEventAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $event=$em->getRepository('GestionMatchBundle:events')->find($id);
        $event->setEnable(1);
        $em->persist($event);
        $em->flush();

        return $this->redirectToRoute('events_admin');
    }
    public function DeleteEvAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $event=$em->getRepository('GestionMatchBundle:events')->find($id);
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute('events_admin');
    }


}