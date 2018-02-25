<?php

namespace GestionCommoditeBundle\Controller;

use GestionCommoditeBundle\Entity\Feedback;
use GestionCommoditeBundle\Form\FeedbackupdateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class feedbackController extends Controller
{
    /**
     * @Route("/newFeed")
     */
//    public function newFeedFrontAction(Request $request)
//    {
//        $feedback = new Feedback();
//        $form = $this->createForm('GestionCommoditeBundle\Form\FeedbackType', $feedback);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($feedback);
//            $em->flush();
//
//            return $this->redirectToRoute('feedback_show', array('idFeedback' => $feedback->getIdfeedback()));
//        }
//        return $this->render('@GestionCommodite/feedback/new_feed.html.twig', array(
//            'feedback' => $feedback,
//            'form' => $form->createView(),
//        ));
//
//    }
//
//    /**
//     * @Route("/showFeed")
//     */X
//    public function showFeedFrontAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $feedback = $em->getRepository('GestionCommoditeBundle:Feedback')->findAll();
//
//        return $this->render('GestionCommoditeBundle:feedback:show_feed.html.twig', array(
//            'feedback' => $feedback,
//        ));
//    }

    /**
     * @Route("/deleteFeed")
     */
    public function deleteFrontFeedAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $feedback = $em->getRepository("GestionCommoditeBundle:Feedback")->find($request->get('idFeedback'));
        $em->remove($feedback);
        $em->flush();
        return $this->redirectToRoute('commoditefront_showcomm', array('idCommodite' => $request->get('idCommodite')));
    }

    /**
     * @Route("/updateFeed")
     */
    public function updateFrontFeedAction(Request $request, $idFeedback)
    {
        $em = $this->getDoctrine()->getManager();
        $feedback = $em->getRepository("GestionCommoditeBundle:Feedback")->find($idFeedback);
        $commodite = $em->getRepository("GestionCommoditeBundle:Commodite")->find($request->get('idCommodite'));
        $galeriecommodite = $em->getRepository("GestionCommoditeBundle:GalerieCommodite")->findBy(array('idCommodite' => $request->get('idCommodite')));
        $requestt = $request->get('idCommodite');
        $AvisAmbiance = $em->getRepository('GestionCommoditeBundle:Feedback')->countAmbiancerate($requestt);
        $AvisAccueil = $em->getRepository('GestionCommoditeBundle:Feedback')->countAccueilrate($requestt);
        $AvisRQP = $em->getRepository('GestionCommoditeBundle:Feedback')->countQPrate($requestt);
        $AvisCuisine = $em->getRepository('GestionCommoditeBundle:Feedback')->countCuisinerate($requestt);
        $form = $this->createForm(FeedbackupdateType::class, $feedback);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($feedback);
            $em->flush();
            return $this->redirectToRoute('commoditefront_showcomm', array('idCommodite' => $request->get('idCommodite')));
        }
        return $this->render('@GestionCommodite/TemplateService/single-update.html.twig',
            array('feedback' => $feedback,
                'form' => $form->createView(),
                'idCommodite' => $request->get('idCommodite'),
                'commodite' => $commodite,
                'galeriecommodite' => $galeriecommodite,

                'AvisAmbiance' => $AvisAmbiance,
                'AvisAccueil' => $AvisAccueil,
                'AvisRQP' => $AvisRQP,
                'AvisCuisine' => $AvisCuisine


            ));
    }

    public function newFrontFeedAction(Request $request)
    {

        $feedback = new Feedback();
        $form = $this->createForm('GestionCommoditeBundle\Form\FeedbackType', $feedback);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($feedback);
            $em->flush();
        }
        return $this->render('@GestionCommodite/TemplateService/single-news.html.twig', array(
            'feedback' => $feedback,
            'form' => $form->createView(),
        ));
    }


}

