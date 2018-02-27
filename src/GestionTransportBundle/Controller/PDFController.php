<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 26/02/2018
 * Time: 22:04
 */

namespace GestionTransportBundle\Controller;

use GestionTransportBundle\Entity\Vehicules;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use MyApp\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PDFController extends Controller
{


    public function generatePDFAction()
    {

        $snappy = $this->get('knp_snappy.pdf');


        $em = $this->getDoctrine()->getManager();
        $u = $em->getRepository(Vehicules::class)->findAll();
        $html = $this->renderView('GestionTransportBundle:Default:PDF.html.twig',
            array(
                'u' => $u
            ));


        $filename = 'Vehicules des utilisateurs';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '.pdf"'
            )
        );


    }


}