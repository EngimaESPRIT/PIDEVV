<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 16/02/2018
 * Time: 20:00
 */

namespace GestionTransportBundle\Controller;


use GestionTransportBundle\Entity\ReservationHoraire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReservationHoraireController extends Controller
{

    public function reserverHoraireAction(Request $request,$id)
    {
        $dr = new ReservationHoraire();
        $em = $this->getDoctrine()->getManager();

        $dd=$em->getRepository('GestionTransportBundle:Horaire')->find($id);


        $x=$this->getUser();
        if ($dd->getCapacite()>0) {
            if ($x = $this->getUser()->getSoldes() >= $dd->getPrix()) {


                $dd->setCapacite($dd->getCapacite() - 1);
                //$dr->setIduser($dd->getIdUser());

                $dr->setIduser($this->getUser());
                $dr->setDateMatch($dd->getDateMatch());
                $dr->setHeureDepart($dd->getHeureDepart());

                $dr->setPointDepart($dd->getPointDepart());
                $dr->setPointArrive($dd->getPointArrive());
                $em->persist($dr);

                $em->flush();


                $pers = $this->getUser();
                $pers->setSoldes($pers->getSoldes() - $dd->getPrix());


                $em->persist($dd);
                $em->flush();
                $em->persist($pers);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice','Reservation effectuée');
                return $this->redirectToRoute('UserChercherHoraire');
            }

            else {
                $this->get('session')->getFlashBag()->add('alert','Solde insuffisant');
                return $this->redirectToRoute('UserChercherHoraire');
            }
        }
    }



}