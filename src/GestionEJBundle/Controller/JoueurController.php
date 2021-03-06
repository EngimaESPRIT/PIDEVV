<?php
/**
 * Created by PhpStorm.
 * User: Rusty
 * Date: 08/02/2018
 * Time: 22:11
 */

namespace GestionEJBundle\Controller;


use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\Diff\DiffColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use GestionEJBundle\Entity\Equipe;
use GestionEJBundle\Entity\Joueur;
use GestionEJBundle\Form\AjoutEquipe;
use GestionEJBundle\Form\AjoutJoueur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\DateTime;


class JoueurController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function GoToAjoutJoueurAction(Request $request)
    {
        $m=new Joueur();
        $form=$this->createForm(AjoutJoueur::class,$m);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
$v=false;

        if ($form->isValid()) {
$d=new \DateTime("now");

            $eq = $em->getRepository("GestionEJBundle:Joueur")->findBy(array('idEquipe'=>$m->getIdEquipe()));
foreach ($eq as $s)
{
    if ($s->getIdEquipe()->getIdequipe()==$m->getIdEquipe()->getIdequipe() and $s->getNumero()==$m->getNumero())
    {
        $v=true;
    }
}
            $i = 0;
            foreach ($eq as $s) {
                $i = $i + 1;
            }
            if ($i <= 23) {
              if ($m->getDatedenaissance()->format('Y')<$d->format('Y')) {
                  if ($v==false) {

                      $file1 = $m->getImagejoueur1();
                      $file2 = $m->getImagejoueur2();
                      $file3 = $m->getImagejoueur3();
                      $fileName = $m->getNom() . $m->getPrenom() . '1' . '.' . $file1->guessExtension();
                      $file1->move(
                          $this->getParameter('Joueurs_directory'),
                          $fileName
                      );
                      $fileName2 = $m->getNom() . $m->getPrenom() . '2' . '.' . $file2->guessExtension();
                      $file2->move(
                          $this->getParameter('Joueurs_directory'),
                          $fileName2
                      );
                      $fileName3 = $m->getNom() . $m->getPrenom() . '3' . $file3->guessExtension();
                      $file3->move(
                          $this->getParameter('Joueurs_directory'),
                          $fileName3
                      );
                      $m->setImagejoueur1($fileName);
                      $m->setImagejoueur2($fileName2);
                      $m->setImagejoueur3($fileName3);
                      $em = $this->getDoctrine()->getManager();

                      $em->persist($m);
                      $em->flush();
                      $this->get('session')->getFlashBag()->add('notice', 'Ajout avec succees');
                      return $this->redirectToRoute('AjoutJoueur');
                  }
                  else
                  {
                      $this->get('session')->getFlashBag()->add('error', 'Echoué Un Joueur a deja ce numero dans cet equipe');

                  }
              }
              else
              {
                  $this->get('session')->getFlashBag()->add('error', 'Echoué Date de naissance Erroné');

              }

            } else {
                $this->get('session')->getFlashBag()->add('error', 'Equipe ne contient que 23 Joueurs');


            }
        }
        return $this->render('@GestionEJ/TemplateAdmin/ajouterjoueur.html.twig',array('form'=>$form->createView()));

    }
    public function GoToAfficheJoueurAction()
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Joueur")->findAll();
        return $this->render('@GestionEJ/TemplateAdmin/afficherJoueurs.html.twig', array('m' => $model));
    }
    public function GoToSuppJoueurAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Joueur")->find($request->get('id'));
        $model=$em->merge($model);
        $em->remove($model);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice','Suppression avec succees');

        return $this->redirectToRoute('AfficheJoueur');
    }
    public function GoToModifJoueurAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Joueur")->find($request->get('id'));
        $form=$this->createForm(AjoutJoueur::class,$model);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $file1 = $model->getImagejoueur1();
            $file2 = $model->getImagejoueur2();
            $file3 = $model->getImagejoueur3();
            $fileName = $model->getNom().$model->getPrenom().'1'.'.'.$file1->guessExtension();
            $file1->move(
                $this->getParameter('Joueurs_directory'),
                $fileName
            );
            $fileName2 = $model->getNom().$model->getPrenom().'2'.'.'.$file2->guessExtension();
            $file2->move(
                $this->getParameter('Joueurs_directory'),
                $fileName2
            );
            $fileName3 = $model->getNom().$model->getPrenom().'3'.$file3->guessExtension();
            $file3->move(
                $this->getParameter('Joueurs_directory'),
                $fileName3
            );
            $model->setImagejoueur1($fileName);
            $model->setImagejoueur2($fileName2);
            $model->setImagejoueur3($fileName3);
            $em->persist($model);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Modification avec succees');

            return $this->redirectToRoute('AfficheJoueur');
        }
        return $this->render('@GestionEJ/TemplateAdmin/modifJoueurs.html.twig',array('m'=>$model,'form'=>$form->createView()
        ,'id'=>$request->get('id')));

    }
    public function AfficherJoueursFrontAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $stades = $em->getRepository("GestionEJBundle:Stade")->findAll();

            $equipes = $em->getRepository("GestionEJBundle:Equipe")->findAll();

            $model = $em->getRepository("GestionEJBundle:Joueur")->findAll();
            $paginator = $this->get('knp_paginator');
            $a=new Joueur();
            $var=0;
            foreach ($a as $model)
            {
                $var=$var+1;
            }
            $paginator = $paginator->paginate(
                $model, /* query NOT result */
                $request->query->getInt('page',$var/23)/*page number*/,
                $request->query->get('limit',18)
            );
            return $this->render('@GestionEJ/template 2/players.html.twig', array('m' => $paginator, 'e' => $equipes,'s'=>$stades));


    }
    public function afficherJoueurFrontAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $stades = $em->getRepository("GestionEJBundle:Stade")->findAll();
        $joueurs = $em->getRepository("GestionEJBundle:Joueur")->find($request->get('id'));



        return $this->render('GestionEJBundle:template 2:single-player.html.twig',array('m'=>$joueurs,'s'=>$stades));
    }

}

