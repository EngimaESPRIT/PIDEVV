<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 10/02/2018
 * Time: 23:51
 */

namespace GestionTransportBundle\Controller;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\AreaChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\Chart;
use GestionTransport\Repository\TransportRepository;
use GestionTransportBundle\Form\ModifierTransportType;
use GestionTransportBundle\Form\TransportType;
use GestionTransportBundle\Entity\Transport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TransportController extends Controller
{

    public function ajoutTransportAction(Request $request)
    {
        $tr = new Transport();
        $Form = $this->createForm(TransportType::class, $tr);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();


            $x1 = $Form->get('numero')->getData();
            $x2 = $Form->get('type')->getData();

            $moyTransExiste = $em->getRepository('GestionTransportBundle:Transport')->findBy(array('numero' => $x1, 'type' => $x2));
            if ($moyTransExiste == null) {


                $em->persist($tr);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice', 'Moyen de transport ajouté avec succés');
                return $this->redirectToRoute('lister_transport');

            } else {
                $this->get('session')->getFlashBag()->add('notice', 'Moyen de transport déja existant');
                return $this->redirectToRoute('ajouter_transport');

            }
        }


        return $this->render('@GestionTransport/Default/ajoutTransport.html.twig', array(
            'f' => $Form->createView()));
    }


    public function listeTransportAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tr = $em->getRepository(Transport::class)->findAll();
        return $this->render('GestionTransportBundle:Default:listeTransport.html.twig',
            array(
                'v' => $tr
            ));
    }


    public function supprimerTransportAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $tr = $em->getRepository("GestionTransportBundle:Transport")->find($id);
        $em->remove($tr);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice', 'Moyen de transport supprimé');
        return $this->redirectToRoute('lister_transport');
    }


    public function modifierTransportAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $tr = $em->getRepository("GestionTransportBundle:Transport")->find($id);


        $Form = $this->createForm(ModifierTransportType::class, $tr);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tr);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'Moyen de transport modifié');
            return $this->redirectToRoute('lister_transport');
        }
        return $this->render("@GestionTransport/Default/updateTransport.html.twig",
            array(
                'form' => $Form->createView()));

    }


}