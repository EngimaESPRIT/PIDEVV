<?php

namespace GestionEJBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        return $this->render('GestionEJBundle:Default:index.html.twig');
    }
    public function afficheAction()
    {
            $em = $this->getDoctrine()->getManager();
            $model = $em->getRepository("GestionEJBundle:Equipe")->afficherparClassement();
            $stades = $em->getRepository("GestionEJBundle:Stade")->findAll();

            $joueurs = $em->getRepository("GestionEJBundle:Joueur")->afficherparButs();
        $jou = $em->getRepository("GestionEJBundle:Joueur")->afficherparCout();


        return $this->render('@GestionEJ/template 2/index.html.twig', array('m' => $model, 'j' => $joueurs,'s'=>$stades,'jo'=>$jou));




    }
}
