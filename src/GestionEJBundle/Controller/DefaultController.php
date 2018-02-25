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
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')==false) {
            $em = $this->getDoctrine()->getManager();
            $model = $em->getRepository("GestionEJBundle:Equipe")->afficherparClassement();
            $stades = $em->getRepository("GestionEJBundle:Stade")->findAll();

            $joueurs = $em->getRepository("GestionEJBundle:Joueur")->afficherparButs();

            return $this->render('@GestionEJ/template 2/index.html.twig', array('m' => $model, 'j' => $joueurs,'s'=>$stades));
        }

        else
        {
            $em = $this->getDoctrine()->getManager();

            $stades = $em->getRepository("GestionEJBundle:Stade")->findAll();

            return $this->render('GestionEJBundle:template 2:page-404.html.twig',array('s'=>$stades));
        }

    }
}
