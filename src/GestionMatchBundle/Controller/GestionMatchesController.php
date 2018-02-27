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

        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Matches")->find($request->get('id'));//afficha 1 match selon id

        $equipea = $em->getRepository ('GestionEJBundle:Equipe')->find($model->getEquipea()); //jeb esm el equipe 1
        $equipeb = $em->getRepository ('GestionEJBundle:Equipe')->find($model->getEquipeb());

        $equipea->setNbrButs($model->getButequipe1());
        $equipeb->setNbrButs($model->getButesuipe2());

        $pointseq1=$equipea->getNbrPoints();
        $pointseq2=$equipeb->getNbrPoints();
       // $this->getDoctrine()->getManager()->flush();


        $buts1= $model->getButequipe1();
        $matchesw1=$model->getMatchesgagnes();
        $matchesl1=$model->getMatchesperdus();
        $matchesd1=$model->getMatchesnulles();

        $buts2= $model->getButesuipe2();
        $matchesw2=$model->getMatchesgagnes();
        $matchesl2=$model->getMatchesperdus();
        $matchesd2=$model->getMatchesnulles();


        if ($buts1>$buts2)
        {
            $equipea->setNbrPoints($pointseq1+3);
            $equipea->setMatchesgagnes($matchesw1+1);
            $equipeb->setMatchesperdus($matchesl2+1);

        }
        else if ($buts1<$buts2)
        {
            $equipeb->setNbrPoints($pointseq2+3);
            $equipea->setMatchesgagnes($matchesl1+1);
            $equipeb->setMatchesperdus($matchesw2+1);
        }
       /* else
        {
            $equipea->setNbrPoints($pointseq1+1);
            $equipeb->setNbrPoints($pointseq2+1);
            $equipea->setMatchesnulles($matchesd1+1);
            $equipea->setMatchesnulles($matchesd2+1);
        }*/


        $this->getDoctrine()->getManager()->flush();

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
