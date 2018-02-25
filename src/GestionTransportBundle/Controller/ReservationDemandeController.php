<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 16/02/2018
 * Time: 19:03
 */

namespace GestionTransportBundle\Controller;


use GestionTransportBundle\Entity\ReservationDemande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReservationDemandeController extends Controller
{

    public function reserverDemandeAction(Request $request, $id)
    {
        $dr = new ReservationDemande();
        $em = $this->getDoctrine()->getManager();
        $dd = $em->getRepository('GestionTransportBundle:Demande')->find($id);


        $x=$this->getUser();
        if ($dd->getNbPlacesDispo() > 0) {

            if ($x=$this->getUser()->getSoldes() >=$dd->getPrix())
            {


            $dd->setNbPlacesDispo($dd->getNbPlacesDispo() - 1);

            $dr->setIduser($this->getUser());


            $dr->setDateMatch($dd->getDateMatch());
            $dr->setHeureDepart($dd->getHeureDepart());

            $dr->setPointDepart($dd->getPointDepart());
            $dr->setPointArrive($dd->getPointArrive());

                $dr->setIdbenificiaire($dd->getIdUser());

            $em->persist($dr);

            $em->flush();

          //  $pers=$em->getRepository('MyAppUserBundle:User')->findOneBy(['id'=>$dd->getIdUser()]);

            $pers=$this->getUser();

            $pers->setSoldes($pers->getSoldes()- $dd->getPrix() );
            $em->persist($dd);
            $em->flush();

                //recuperer l'id de l'utilisater qui a posté la demande poru lui ajouter le solde de la reservation
                $var =$dd->getIdUser();
                $xd=$em->getRepository('MyAppUserBundle:User')->find($var);

                $xd->setSoldes($xd->getSoldes()+$dd->getPrix());
                $em->persist($xd);
                $em->flush();


            $em->persist($pers);
            $em->flush();


                $this->get('session')->getFlashBag()->add('notice','Reservation effectuée');


                return $this->redirectToRoute('UserChercherDemande');
        }

        else {
            $this->get('session')->getFlashBag()->add('alert','Solde insuffisant');
            return $this->redirectToRoute('UserChercherDemande');
        }

        }

    }










}