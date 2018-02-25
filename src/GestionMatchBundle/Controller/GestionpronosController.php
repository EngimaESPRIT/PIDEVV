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

    public function addToCartAction ($id,$cote)
    {
        $session= $this->get('session');

        if (!$session->has('paris')) $session->set('paris',array());
        $paris=$session->get('paris');
        if(array_key_exists($id,$paris)){


        $paris[$id]=$paris[$id]*$cote;
        }else $paris[$id]=$cote;

        $session->set('paris',$paris);
        //var_dump($session->get('paris'));
        //$session->remove('paris');
        //die();
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

    }



    }
