<?php

namespace GestionCommoditeBundle\Controller;

use DateInterval;
use GestionCommoditeBundle\Entity\Commodite;
use GestionCommoditeBundle\Entity\Feedback;
use GestionCommoditeBundle\Form\CommoditeupdateType;
use GestionCommoditeBundle\Form\FeedbackType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommoditeController extends Controller
{
    /**
     * @Route("/new")
     */
    public function newBackAction(Request $request)
    {
        $commodite = new Commodite();
        $form = $this->createForm('GestionCommoditeBundle\Form\CommoditeType', $commodite);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commodite);
            $em->flush();
            $_SESSION['commodite'] = $commodite->getIdCommodite();
            return $this->redirectToRoute('galeriecommodite_new');
            //return $this->redirectToRoute('commodite_show', array('idCommodite' => $commodite->getIdcommodite()));
        }
        return $this->render('@GestionCommodite/TemplateAdmin/newcommodite.html.twig', array(
            'commodite' => $commodite,
            'form' => $form->createView(),
            // ...
        ));
    }
    /**
     * @Route("/show")
     */
    public function showBackAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commodites = $em->getRepository('GestionCommoditeBundle:Commodite')->findAll();
        return $this->render('@GestionCommodite/TemplateAdmin/showcommodite.html.twig', array(
            'commodites' => $commodites,
        ));


    }

//
//    public function showBackAction(Request $request)
//    {
//        $commodites=new Commodite();
//        $em = $this->getDoctrine()->getManager();
//        $nomCommodite=$request->get('nomCommodite');
//
//            $commodites = $em->getRepository("GestionCommoditeBundle:Commodite")->findBy(array('nomCommodite' => $nomCommodite));
//
//           // $commodites = $em->getRepository('GestionCommoditeBundle:Commodite')->findAll();
//
//
//        return $this->render('@GestionCommodite/TemplateAdmin/showcommodite.html.twig', array(
//            'commodites' => $commodites,
//
//        ));
//
//    }

    /**
     * @Route("/delete")
     */
    public function deleteBackAction($idCommodite)
    {
        $em = $this->getDoctrine()->getManager();
        $commodite = $em->getRepository("GestionCommoditeBundle:Commodite")->find($idCommodite);
        $em->remove($commodite);
        $em->flush();
        return $this->redirectToRoute('commodite_show');
    }

    /**
     * @Route("/update")
     */
    public function updateBackAction(Request $request, $idCommodite)
    {
        $em = $this->getDoctrine()->getManager();
        $commodite = $em->getRepository("GestionCommoditeBundle:Commodite")->find($idCommodite);
        $form = $this->createForm(CommoditeupdateType::class, $commodite);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($commodite);
            $em->flush();
            return $this->redirectToRoute('commodite_show', array('idCommodite' => $commodite->getIdcommodite()));
        }
        return $this->render('@GestionCommodite/TemplateAdmin/updatecommodite.html.twig',
            array('commodite' => $commodite, 'form' => $form->createView()
            ));
    }

    //afficher tout les co;;idit2
    public function showFrontAction(Request $request)
    {
        $commodites = new Commodite();
        $em = $this->getDoctrine()->getManager();
        $nomCommodite = $request->get('nomCommodite');

        if ($request->isMethod("POST")) {
            $commodites = $em->getRepository("GestionCommoditeBundle:Commodite")->findBy(array('nomCommodite' => $nomCommodite));

        } else {
            $commodites = $em->getRepository('GestionCommoditeBundle:Commodite')->findAll();
        }
        $c = array();
        foreach ($commodites as $commodite) {
            $AvisAmbiance = $em->getRepository('GestionCommoditeBundle:Feedback')->countAmbiancerate($commodite->getIdCommodite());
            $AvisAccueil = $em->getRepository('GestionCommoditeBundle:Feedback')->countAccueilrate($commodite->getIdCommodite());
            $AvisRQP = $em->getRepository('GestionCommoditeBundle:Feedback')->countQPrate($commodite->getIdCommodite());
            $AvisCuisine = $em->getRepository('GestionCommoditeBundle:Feedback')->countCuisinerate($commodite->getIdCommodite());
            $nb = $em->getRepository('GestionCommoditeBundle:Feedback')->findBy(['idCommodite' => $commodite]);
            $commodite->setNbLikes(count($commodite->getLikes()));
            //count($nb);
            //$a= 0;
            $moy = array();
            foreach ($nb as $n) {
                $b = array();
                array_push($b, $n->getRateAcceuil());
                array_push($b, $n->getRateAmbiance());
                array_push($b, $n->getRateCuisine());
                array_push($b, $n->getRateRqp());
                //$a = $n->getRateAcceuil()+$n->getRateAmbiance()+$n->getRateCuisine()+$n->getRateRqp();
                $commodite->setMoy(array_sum($b) / 4);
            }
            array_push($c, $commodite);
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $c, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            2/*limit per page*/
        );
        return $this->render('@GestionCommodite/TemplateService/news-left-sidebar.html.twig', array(
            'commodite' => $pagination,
        ));

    }


//    public function GoToShowAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $commodites = $em->getRepository('GestionCommoditeBundle:Commodite')->findAll();
//
//
//        return $this->render('@GestionCommodite/TemplateService/news-left-sidebar.html.twig', array(
//            'commodite' => $commodites,
//
//        ));
//
//    }

    /**
     * @Route("/getByName", name="searchByName")
     * @Method("Get")
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function searchAction(Request $request)
    {
        $nom = $request->get('nom');
        $em = $this->getDoctrine()->getManager();
        if ($nom == '') {
            $cs = $em->getRepository('GestionCommoditeBundle:Commodite')->findAll(['nomCommodite' => $nom]);
        } else {
            $cs = $em->getRepository('GestionCommoditeBundle:Commodite')->findBy(['nomCommodite' => $nom]);
        }
        $commodites = array();
        foreach ($cs as $commodite) {
            $nb = $em->getRepository('GestionCommoditeBundle:Feedback')->findBy(['idCommodite' => $commodite]);
            $commodite->setNbLikes(count($commodite->getLikes()));
            foreach ($nb as $n) {
                $b = array();
                array_push($b, $n->getRateAcceuil());
                array_push($b, $n->getRateAmbiance());
                array_push($b, $n->getRateCuisine());
                array_push($b, $n->getRateRqp());
                //$a = $n->getRateAcceuil()+$n->getRateAmbiance()+$n->getRateCuisine()+$n->getRateRqp();
                $commodite->setMoy(array_sum($b) / 4);
            }
            $images = [];
            foreach ($commodite->getImages() as $image) {
                array_push($images, $image->getName());
            }
            $temp = array(
                'id' => $commodite->getIdCommodite(),
                'adresse' => $commodite->getAdresse(),
                'moy' => $commodite->getMoy(),
                'description' => $commodite->getDescription(),
                'nom' => $commodite->getNomCommodite(),
                'images' => $images,
                'tel' => $commodite->getTel(),
                'nbLikes'=>$commodite->getNbLikes()
            );
            array_push($commodites, $temp);
        }
        $response = new JsonResponse(
            $commodites, 200);
        return $response;
    }

    /**
     * @Route("/getByCategories", name="searchByCategorie")
     * @Method("Get")
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function filterByCategorieAction(Request $request)
    {
        $nom = $request->get('nom');
        $Categorie = $request->get('categorie');
        $em = $this->getDoctrine()->getManager();
        if ($nom == '') {
            $cs = $em->getRepository('GestionCommoditeBundle:Commodite')->findBy(['categorie' => $Categorie]);
        } else {
            $cs = $em->getRepository('GestionCommoditeBundle:Commodite')->findBy(['nomCommodite' => $nom, 'categorie' => $Categorie]);
        }
        $commodites = array();
        foreach ($cs as $commodite) {
            $nb = $em->getRepository('GestionCommoditeBundle:Feedback')->findBy(['idCommodite' => $commodite]);
            $commodite->setNbLikes(count($commodite->getLikes()));
            foreach ($nb as $n) {
                $b = array();
                array_push($b, $n->getRateAcceuil());
                array_push($b, $n->getRateAmbiance());
                array_push($b, $n->getRateCuisine());
                array_push($b, $n->getRateRqp());
                //$a = $n->getRateAcceuil()+$n->getRateAmbiance()+$n->getRateCuisine()+$n->getRateRqp();
                $commodite->setMoy(array_sum($b) / 4);
            }
            $images = [];
            foreach ($commodite->getImages() as $image) {
                array_push($images, $image->getName());
            }
            $temp = array(
                'id' => $commodite->getIdCommodite(),
                'adresse' => $commodite->getAdresse(),
                'moy' => $commodite->getMoy(),
                'description' => $commodite->getDescription(),
                'nom' => $commodite->getNomCommodite(),
                'images' => $images,
                'tel' => $commodite->getTel(),
                'nbLikes'=>$commodite->getNbLikes()
            );
            array_push($commodites, $temp);
        }
        $response = new JsonResponse(
            $commodites, 200);
        return $response;
    }



    public function showFrontComAction(Request $request, $idCommodite)
    {
        $f = new Feedback();
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(FeedbackType::class, $f);
        $form->handleRequest($request);
        $feed = $request->get('idCommodite');
        $commodites = $em->getRepository('GestionCommoditeBundle:Commodite')->find($feed);
        $commodites1 = $em->getRepository('GestionCommoditeBundle:Commodite')->findOneBy(array('idCommodite' => $idCommodite));
        $AvisAmbiance = $em->getRepository('GestionCommoditeBundle:Feedback')->countAmbiancerate($idCommodite);
        $AvisAccueil = $em->getRepository('GestionCommoditeBundle:Feedback')->countAccueilrate($idCommodite);
        $AvisRQP = $em->getRepository('GestionCommoditeBundle:Feedback')->countQPrate($idCommodite);
        $AvisCuisine = $em->getRepository('GestionCommoditeBundle:Feedback')->countCuisinerate($idCommodite);

        $feedback = $em->getRepository('GestionCommoditeBundle:Feedback')
            ->findByIdCommodite($commodites->getidCommodite());
        //$commodites->
        $nbMyFeedback = count($em->getRepository('GestionCommoditeBundle:Feedback')->findBy(['idUser' => $this->getUser(), 'idCommodite' => $idCommodite]));
        $galeriecommodite = $em->getRepository("GestionCommoditeBundle:GalerieCommodite")->findBy(array('idCommodite' => $request->get('idCommodite')));
        $like = count($em->getRepository('GestionCommoditeBundle:Like')->findBy(['user' => $this->getUser(), 'commodite' => $idCommodite]));

        if ($form->isSubmitted()) {
            $f->setIdCommodite($commodites1);
            $f->setIdUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $time = new \DateTime();
            $time->add(new DateInterval('PT1H'));
            //$time->format('H:i:s \O\n Y-m-d');
            $f->setDateCommentaire($time);
            $em->persist($f);
            $em->flush();
            $form = $this->createForm(FeedbackType::class, $f);

            return $this->redirectToRoute('commoditefront_showcomm',
                array('idCommodite' => $request->get('idCommodite')
                , 'idFeedback' => $request->get('idFeedback')
                ));
        }
        return $this->render('@GestionCommodite/TemplateService/single-news.html.twig',
            array(
                'form' => $form->createView(),
                'commodite' => $commodites,
                'feedback' => $feedback,
                'galeriecommodite' => $galeriecommodite,
                'AvisAmbiance' => $AvisAmbiance,
                'AvisAccueil' => $AvisAccueil,
                'AvisRQP' => $AvisRQP,
                'AvisCuisine' => $AvisCuisine,
                'nbMyFeedback' => $nbMyFeedback, 'like' => $like
            ));
    }

//
//        public function rechercheDQLAction($nomCommodite) {
//        $em = $this->getDoctrine()->getManager();
//        $commodite = $em->getRepository("GestionCommoditeBundle:Commodite")->DQL($nomCommodite);
//       return $this->render('@GestionCommodite/TemplateService/news-left-sidebar.html.twig',
//            array('commodite' => $commodite));
//           }
}


/*
$f = new Feedback();
$em = $this->getDoctrine()->getManager();
$form = $this->createForm(FeedbackType::class, $f);
$seif = $request->get('idCommodite');
//return new Response($seif);

$commodites = $em->getRepository('GestionCommoditeBundle:Commodite')->find($idCommodite);
$feedback = $em->getRepository('GestionCommoditeBundle:Feedback')
    ->findByIdCommodite($commodites->getidCommodite());

if ($form->isValid()) {
    $em = $this->getDoctrine()->getManager();
    $em->persist($f);
    $em->flush();
    return $this->render('@GestionCommodite/TemplateService/single-news.html.twig',
        array(
            'commodite' => $idCommodite,
            'form'=>$form->createView(),
        ));
}
return $this->render('@GestionCommodite/TemplateService/single-news.html.twig',
    array(
        'commodite' => $commodites,
        'commodites' => $idCommodite,
        'feedback' => $feedback,
        'form'=>$form->createView()
    ));*/
//    }
//    public function RechercheDQLAction(Request $request){
//        $commodite=new Commodite();
//        $em=$this->getDoctrine()->getManager();
//        $Form = $this->createForm(RechercheCommoditeType.php::class,$commodite);
//        $Form->handleRequest($request);
//        if ($request->isXmlHttpRequest()){
//            $nomCommodite=$request->get("n");
//            $serialzier=new Serializer((array(new ObjectNormalizer())));
//            $com=$em->getRepository("GestionCommoditeBundle:Commodite")->RechercheDQL($nomCommodite);
//            $commodite= $serialzier->normalize($com);
//            return new JsonResponse($commodite);
//        }
//        else{
//            $com = $em->getRepository("GestionCommoditeBundle:Commodite")->findAll();
//        }
//        return $this->render(
//            "@GestionCommodite/commodite/recherche.html.twig",array('form'=>$Form->createview(),'com'=>$com));}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//            return $this->render('@GestionCommodite/TemplateService/single-news.html.twig',
//                array(
//                    'commodite' => $commodites,
//                    'commodites' => $idCommodite,
//                    'feedback' => $feedback,
//
//                    'galeriecommodite' => $galeriecommodite,
//                    'form'=>$form->createView()
//                ));
