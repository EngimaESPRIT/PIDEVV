<?php

namespace GestionEJBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $euro2016 = $this->footballData->getSeason(424);

        $this->template->name = $euro2016->getName();

        $this->template->fixtures = $euro2016->getFixtures();
        return $this->render('GestionEJBundle:Default:index.html.twig');
    }
    public function afficheAction()
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')==false) {
            $em = $this->getDoctrine()->getManager();
            $model = $em->getRepository("GestionEJBundle:Equipe")->afficherparClassement();

            $joueurs = $em->getRepository("GestionEJBundle:Joueur")->afficherparButs();

            return $this->render('@GestionEJ/template 2/index.html.twig', array('m' => $model, 'j' => $joueurs));
        }

        else
        {
            return $this->render('GestionEJBundle:template 2:page-404.html.twig');
        }

    }
}
