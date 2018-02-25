<?php

namespace GestionMatchBundle\Controller;

use Doctrine\ORM\Query;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GestionMatchBundle\Form\MatchesType;
use GestionMatchBundle\Entity\Matches;
use GestionMatchBundle\Entity\Groupe;
use GestionEJBundle\Entity\Stade;
use GestionEJBundle\Entity\Equipe;
use Symfony\Component\HttpFoundation\Request;

class GestionMatchesController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function GoToAjoutMatcheAction(Request $request)
    {
        $m = new Matches();
        $form = $this->createForm(MatchesType::class, $m);
        $form->handleRequest($request);
         if ($form->isValid()) {

        $em = $this->getDoctrine()->getManager();

        $em->persist($m);
        $em->flush();
         }
        return $this->render('@GestionMatch/Admin/AjouterMatche.html.twig',array('form'=>$form->createView()));
    }

    public function GoToAfficheMatcheAction()
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Matches")->findAll();
        return $this->render('@GestionMatch/Front/fixtures.html.twig', array('m' => $model));
    }

    public function GoToAfficheMatche2Action()
{
    $em = $this->getDoctrine()->getManager();
    $model = $em->getRepository("GestionMatchBundle:Matches")->findAll();
    return $this->render('@GestionMatch/Admin/afficherlesmatches.html.twig', array('m2' => $model));
}

    public function CalendrierAction()
    {
        return $this->render('@GestionMatch/Front/calendrier.html.twig');
    }


    public function GoToModifMatcheAction(Request $request)
    {
        $m = new Matches();
        $g = new Groupe();
        $E= new Equipe();
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Matches")->find($request->get('id'));

        $buts1=$request->get(butequipe1);
        $buts2=$request->get(butequipe2);
        if ($buts1>$buts2)
        {
            $E->setButscm($buts1);
            $E->setButscm($buts1);
        }
        $request="";
        Id.$E->setButscm($buts1);
        $E->setButscm($buts1);
        // if (find($request->get(butequipe1)   > ($request->get(butequipe2)
        //{ setequipe1.nbr_points+=3)


        $form=$this->createForm(MatchesType::class,$model);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($model);
            $em->flush();

            return $this->redirectToRoute('affiche_match2');
        }

        return $this->render('@GestionMatch/Admin/ModifierMatch.html.twig',array('form'=>$form->createView()));

    }




    public function GoToSuppMatcheAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Matches")->find($request->get('id'));
        $model=$em->merge($model);
        $em->remove($model);
        $em->flush();

        return $this->redirectToRoute('affiche_match2');
    }


}
