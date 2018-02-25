<?php

namespace GestionCommoditeBundle\Controller;

use GestionCommoditeBundle\Entity\Commoditefavorite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CommoditefavoriteController extends Controller
{
    /**
     * @Route("/newFav")
     */
    public function newFavAction( Request $request)
    {
        {
            $commoditefavorite = new Commoditefavorite();
            $form = $this->createForm('GestionCommoditeBundle\Form\CommoditefavoriteType', $commoditefavorite);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($commoditefavorite);
                $em->flush();

                return $this->redirectToRoute('commoditefavorite_show', array('idFavorite' => $commoditefavorite->getIdfavorite()));
            }

            return $this->render('@GestionCommodite/Commoditefavorite/new_fav.html.twig', array(
                'commoditefavorite' => $commoditefavorite,
                'form' => $form->createView(),
            ));
        }
    }

    /**
     * @Route("/showFav")
     */
    public function showFavAction ()
    {
            $em = $this->getDoctrine()->getManager();
            $commoditefavorite = $em->getRepository('GestionCommoditeBundle:Commoditefavorite')->findAll();
            return $this->render('@GestionCommodite/Commoditefavorite/show_fav.html.twig', array(
            'commoditefavorite' => $commoditefavorite
        ));
    }

    /**
     * @Route("/deleteFava")
     */
    public function deleteFavaAction($idFavorite)
        {
        $em = $this->getDoctrine()->getManager();
        $commoditefavorite = $em->getRepository("GestionCommoditeBundle:Commoditefavorite")->find($idFavorite);
        $em->remove($commoditefavorite);
        $em->flush();
        return $this->redirectToRoute('commoditefavorite_show');
    }


}
