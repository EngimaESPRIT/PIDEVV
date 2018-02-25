<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 11/02/2018
 * Time: 00:13
 */

namespace GestionTransportBundle\Controller;


use GestionTransportBundle\Entity\Horaire;

use GestionTransportBundle\Form\HoraireType;
use GestionTransportBundle\Form\ModifierHoraireType;
use GestionTransportBundle\Form\UserHoraireType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class HoraireController extends Controller
{

    public function ajoutHoraireAction(Request $request)
    {
        $h= new Horaire();




        $Form = $this->createForm(HoraireType::class,$h);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $h->setCapacite($h->getIdTransport()->getCapacite());

            $h->setPointDepart($h->getIdTransport()->getStation());

            $em->persist($h);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Horaire ajouté avec succés');
         return $this->redirectToRoute('lister_horaire');

        }


        return $this->render('GestionTransportBundle:Default:ajoutHoraire.html.twig', array(
            'f' => $Form->createView()));
    }




    public function listeHoraireAction()
    {
        $em = $this->getDoctrine()->getManager();
        $h = $em->getRepository(Horaire::class)->findAll();
        return $this->render('GestionTransportBundle:Default:listeHoraire.html.twig',
            array(
                'v' => $h
            ));
    }


    public function supprimerHoraireAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $h = $em->getRepository("GestionTransportBundle:Horaire")->find($id);
        $em->remove($h);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice','Horaire supprimé avec succés');
        return $this->redirectToRoute('lister_horaire');
    }



    public function modifierHoraireAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $vh = $em->getRepository("GestionTransportBundle:Horaire")->find($id);



        $Form = $this->createForm(ModifierHoraireType::class, $vh);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();




            $em->persist($vh);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Horaire modifié avec succés');
            return $this->redirectToRoute('lister_horaire');
        }
        return $this->render("@GestionTransport/Default/updateHoraire.html.twig",
            array(
                'form' => $Form->createView()));

    }


    public function RechercheAction(Request $request)
    {
        $res = new Horaire();

        $Form = $this->createForm(UserHoraireType::class, $res);
        $Form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();


        $res=$this->getDoctrine()->getManager()->createQuery('SELECT e FROM GestionTransportBundle:Horaire e WHERE e.dateMatch >= CURRENT_DATE() ORDER BY e.dateMatch ')
            ->getResult();

        return $this->render("@GestionTransport/Default/UserRechercheHoraire.html.twig", array('Form' => $Form->createView(), 'res' => $res));
    }



}