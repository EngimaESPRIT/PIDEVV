<?php
/**
 * Created by PhpStorm.
 * User: Rusty
 * Date: 11/02/2018
 * Time: 18:27
 */

namespace GestionEJBundle\Controller;


use GestionEJBundle\Entity\Stade;
use GestionEJBundle\Form\AjoutStade;
use Symfony\Component\HttpFoundation\Request;
class StadeController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function AjouterStadeAction(Request $request)
    {
        $stade = new Stade();
        $form = $this->createForm(AjoutStade::class, $stade);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $om = $this->getDoctrine()->getManager();
            $file = $stade->getPhotostade();
            $fileName = $stade->getNom() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('Joueurs_directory'),
                $fileName
            );
            $stade->setPhotostade($fileName);
            $om->persist($stade);
            $om->flush();
        }
        return $this->render('@GestionEJ/TemplateAdmin/ajouterstade.html.twig', array(
            'form' => $form->CreateView()
        ));
    }
 public function afficherStadeAction()
    {
    $em = $this->getDoctrine()->getManager();
$model = $em->getRepository("GestionEJBundle:Stade")->findAll();
return $this->render('@GestionEJ/TemplateAdmin/afficherStade.html.twig', array('m' => $model));
}
    public function GoToSuppStadeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Stade")->find($request->get('id'));
        $model=$em->merge($model);
        $em->remove($model);
        $em->flush();

        return $this->redirectToRoute('AfficherStade');
    }
    public function GoToModifStadeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Stade")->find($request->get('id'));
        $form=$this->createForm(AjoutStade::class,$model);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $file = $model->getPhotostade();
            $fileName = $model->getNom() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('Joueurs_directory'),
                $fileName
            );
            $model->setPhotostade($fileName);
            $em->persist($model);
            $em->flush();
            return $this->redirectToRoute('AfficherStade');
        }
        return $this->render('@GestionEJ/TemplateAdmin/modifStade.html.twig',array('m'=>$model,'form'=>$form->createView()
        ,'id'=>$request->get('id')));

    }
    public function afficherStadeFrontAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Stades = $em->getRepository("GestionEJBundle:Stade")->findAll();

        $model = $em->getRepository("GestionEJBundle:Stade")->find($request->get('id'));
        return $this->render('@GestionEJ/template 2/stades.html.twig',array('m'=>$model,'s'=>$Stades));
    }
    public function afficherStadesFrontAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Stades = $em->getRepository("GestionEJBundle:Stade")->findAll();
        $St = $em->getRepository("GestionEJBundle:Stade")->afficherDistinct();
        return $this->render('GestionEJBundle:template 2:StadesSelection.html.twig',array('s'=>$Stades,'st'=>$St));
    }
}