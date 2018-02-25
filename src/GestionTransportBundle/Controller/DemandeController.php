<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 11/02/2018
 * Time: 15:17
 */

namespace GestionTransportBundle\Controller;


use GestionTransportBundle\Entity\Demande;
use GestionTransportBundle\Entity\ReservationDemande;
use GestionTransportBundle\Entity\Vehicules;
use GestionTransportBundle\Form\DemandeType;
use GestionTransportBundle\Form\ModifierDemandeType;
use GestionTransportBundle\Form\reserverDemandeType;
use GestionTransportBundle\Form\UserDemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\DateTime;

class DemandeController extends Controller
{
    public function ajoutDemandeAction(Request $request)
    {
        $d = new Demande();


        $Form = $this->createForm(DemandeType::class, $d);
        $Form->handleRequest($request);
        if ($Form->isValid() ) {
            $em = $this->getDoctrine()->getManager();

            // $user=$this->getUser();
            //$d->setIdUser($user);
            // $nb=$em->getRepository('GestionTransportBundle:Vehicules')->find($Form->get('id_vehicule'));
            //    $d->setNbPlacesDispo($nb->getNbPlaces());

            $d->setNbPlacesDispo($d->getIdVehicule()->getNbPlaces());
            $em->persist($d);
            $em->flush();



            $this->get('session')->getFlashBag()->add('notice','Offre de covoiturage ajoutée avec succés');


            return $this->redirectToRoute('lister_demande');
            }


          /*  if ($d->getNbPlacesDispo() >  $x )
        {
            return new Response('Nombre de place dispooo > nombre de place de la vehicule MCH LOGIQUE');


        }*/


      return $this->render('GestionTransportBundle:Default:ajoutDemande.html.twig', array('f' => $Form->createView()));
    }



    public function listeDemandeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $d = $em->getRepository(Demande::class)->findAll();
        return $this->render('GestionTransportBundle:Default:listeDemande.html.twig',
            array(
                'v' => $d
            ));
    }


    public function supprimerDemandeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $v = $em->getRepository("GestionTransportBundle:Demande")->find($id);
        $em->remove($v);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice','Offre de covoiturage supprimée avec succés');
        return $this->redirectToRoute('lister_demande');
    }

    public function modifierDemandeAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $vh = $em->getRepository("GestionTransportBundle:Demande")->find($id);



        $Form = $this->createForm(ModifierDemandeType::class, $vh);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();

           // $user=$this->getUser();

            //$vh->setIdUser($user);

            $em->persist($vh);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Offre de covoiturage modifiée avec succés');
            return $this->redirectToRoute('lister_demande');
        }
        return $this->render("@GestionTransport/Default/updateDemande.html.twig",
            array(
                'form' => $Form->createView()));

    }


    public function RechercheAction(Request $request)
    {
        $res = new Demande();

        $Form = $this->createForm(UserDemandeType::class, $res);
        $Form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();












        // if ($Form->isValid()) {
            // if ($request->isXmlHttpRequest()) {
            // $xt = $request->get('s');

          //   $serializer = new Serializer(array(new ObjectNormalizer()));
           //  $dd = $em->getRepository("GestionTransport:Demande")->RechercheDQL($xt);
           //  $res = $serializer->normalize($dd);
             //return new JsonResponse($res);

          // $res = $em->getRepository("GestionTransportBundle:Demande")->findBy(array('pointDepart' => $res->getPointDepart(),'dateMatch'=>));

             $res=$this->getDoctrine()->getManager()->createQuery('SELECT e FROM GestionTransportBundle:Demande e WHERE e.dateMatch >= CURRENT_DATE() ORDER BY e.dateMatch ')->getResult();

        return $this->render("@GestionTransport/Default/UserRechercheDemande.html.twig", array('Form' => $Form->createView(), 'res' => $res));
    }


















}