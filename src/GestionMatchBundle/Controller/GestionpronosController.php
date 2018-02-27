<?php

namespace GestionMatchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GestionMatchBundle\Form\PronosticsType;
use GestionMatchBundle\Entity\Pronostics;
use Symfony\Component\HttpFoundation\Request;

class GestionpronosController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function GoToAjoutPronoAction(Request $request)
    {
        $m = new Pronostics();
        $form = $this->createForm(PronosticsType::class, $m);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();
        }
        return $this->render('@GestionMatch/Admin/AjouterProno.html.twig',array('form'=>$form->createView()));
    }

    public function  GoToAffichePronoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Pronostics")->findAll();
        return $this->render('@GestionMatch/Admin/Affichepronos.html.twig', array('m' => $model));

    }

    public function GoToModifierPronoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Pronostics")->find($request->get('id'));
        $form=$this->createForm(PronosticsType::class,$model);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($model);
            $em->flush();
            return $this->redirectToRoute('affiche_prono');
        }
        return $this->render('@GestionMatch/Admin/ModifierPronos.html.twig',array('form'=>$form->createView()
        ));

    }

    public function  GoToCartAction()
    {
        $em = $this->getDoctrine()->getManager();
        //$model = $em->getRepository("GestionMatchBundle:Pronostics")->findAll();
        return $this->render('@GestionMatch/Front/cart.html.twig');

    }

   /* public function  GoToAffichePronoClientAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionMatchBundle:Pronostics")->find($request->get('idProno'));
        return $this->render('@GestionMatch/Front/listematches.html.twig', array('m' => $model));

    }*/

    public function GoToAffichePronoClientAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
       $id=$request->get('id');
       $test=1;

        $model = $em->getRepository("GestionMatchBundle:Pronostics")->findOneBy(array('idMatch' => $id));

/*
var_dump($model);
die();*/


        if ($model  != null )
        {

            return $this->render('@GestionMatch/Front/Message2.html.twig');
            die();
        }

        $Pronostics = new Pronostics();
        $em = $this->getDoctrine()->getManager();
        $Form = $this->createForm(PronosticsType::class, $Pronostics);

        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $Pronostics = $em->getRepository("GestionMatchBundle:Pronostics")->findBy(array('cotes' => $Pronostics->getIdMatch()));

        } else {
            $Pronostics = $em->getRepository("GestionMatchBundle:Pronostics")->findAll();
        }

        return $this->render('@GestionMatch/Front/listematches.html.twig', array("form" => $Form->createView(), 'p' => $Pronostics));
    }

    public function AjouterpronoclientAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $id=$request->get('id');

        $choix=$request->get('choix');
       /* var_dump($id);
        var_dump($choix);
        die;*/
        //$model = $em->getRepository ('GestionMatchBundle:Pronostics')->find($request->get('id'));
        $model = $em->getRepository("GestionMatchBundle:Pronostics")->findOneBy(array('idUser' => $id));


        $model->setChoixutilisateur($choix);
       // $model->setIdProno($id);

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->render('@GestionMatch/Front/Message.html.twig');
    }


    public  function AffichermespronostiquesAction (Request $request)
    {
        $session = $this->get('session');
        $session->start();
       // $user->getUser();
        $id=$session->getId();
        // ici probleme recuperation id ***********************************************
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $id=$user->getId();
        var_dump($id);
        //die();*/
        $em = $this->getDoctrine()->getManager();
        //$id=$request->get('id');
        $model = $em->getRepository("GestionMatchBundle:Pronostics")->findBy(array('idUser' => $id));

        return $this->render('@GestionMatch/Front/listedespronostiquesclient.html.twig', array('m' => $model));

    }

    public  function PronostiquesValideAction (Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("MyAppUserBundle:User")->find($request->get('id'));//afficha 1 user selon id
       // $user = $em->getRepository ('GestionMatchBundle:GestionMatchBundle')->find($model->getIdUser()); //jeb esm el equipe 1

        $solde=$user->getSoldes();
        $user->setSoldes($solde+3);

        return $this->redirectToRoute('affiche_prono');


    }

    public  function PronostiquesNonValideAction (Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("MyAppUserBundle:User")->find($request->get('id'));//afficha 1 user selon id
        $solde=$user->getSoldes();
        $user->setSoldes($solde-3);

        return $this->redirectToRoute('affiche_prono');
    }

    /* public function addToCartAction ($id,$choix)
    {
        $session= $this->get('session');

        if (!$session->has('paris')) $session->set('paris',array());
        $paris=$session->get('paris');
        if(array_key_exists($id,$choix)){


     //   $paris[$id]=$paris[$id]*$cote;
        }else $paris[$id]=$choix;

        $session->set('paris',$paris);
        var_dump($session->get('paris'));
        //$session->remove('paris');
        die();
        $em=$this->getDoctrine()->getManager();
        $am=$em->getRepository("GestionMatchBundle:Pronostics")->findAll();
        if (!$session->has('paris')) $session->GestionMatchBundle('paris',array());

        return $this->render('@GestionMatch/Front/cart.html.twig',array('p'=>$am,'paris'=>$session->get('paris')));
    }

    public function cartAction()
    {

        $session= $this->get('session');
        if (!$session->has('paris')) $session->set('paris',array());

        $em=$this->getDoctrine()->getManager();
        $produits=$em->getRepository('GestionMatchBundle:Pronostics')->findArray(array_keys($session->get('paris')));
var_dump($produits);
die();
        return $this->render('@GestionMatch/Front/cart.html.twig',array('produits'=>$produits,
            'paris'=>$session->get('paris')));
    }

    public function AfficheDetailsAction($id)

    {
        $em = $this->getDoctrine()->getManager();
        $prod = $em->getRepository("GestionMatchBundle:Pronostics")->find($id);
        return $this->render('@GestionMatchBundle/Front/cart.html.twig',array(
            'p'=>$prod
        ));

    }*/



    }
