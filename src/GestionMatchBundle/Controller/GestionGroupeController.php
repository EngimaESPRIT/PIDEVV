<?php

namespace GestionMatchBundle\Controller;

use GestionMatchBundle\Form\GroupeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GestionMatchBundle\Form\MatchesType;
use GestionMatchBundle\Entity\Groupe;
use Symfony\Component\HttpFoundation\Request;


class GestionGroupeController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function GoToAfficheGroupesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $GA = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'A'));
        $GB = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'B'));
        $GC = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'C'));
        $GD = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'D'));
        $GE = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'E'));
        $GF = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'F'));
        $GH = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'H'));


        return $this->render('@GestionMatch/Admin/AfficherGroupe.html.twig', array('G' => $GA,'G2' => $GB,'G3' => $GC,'G4' => $GD,'G5' => $GE,'G6' => $GF,'G7' => $GH));
    }

    public function GoToAfficheGroupesFrontAction()
    {
        $em = $this->getDoctrine()->getManager();
        $GA = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'A'));
        $GB = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'B'));
        $GC = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'C'));
        $GD = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'D'));
        $GE = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'E'));
        $GF = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'F'));
        $GH = $em->getRepository("GestionMatchBundle:Groupe")->findBy(array('nomGroupe'=>'H'));


        return $this->render('@GestionMatch/Front/affichegroupes.html.twig', array('G' => $GA,'G2' => $GB,'G3' => $GC,'G4' => $GD,'G5' => $GE,'G6' => $GF,'G7' => $GH));
    }

    public function GoToModifGroupeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Groupe")->find($request->get('id'));
        $form=$this->createForm(GroupeType::class,$model);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($model);
            $em->flush();
            return $this->redirectToRoute('affiche_groupe');
        }
        return $this->render('@GestionMatch/Admin/ModifGroupe.html.twig',array('form'=>$form->createView()
        ));

    }
}
