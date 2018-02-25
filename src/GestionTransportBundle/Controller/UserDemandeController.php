<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 17/02/2018
 * Time: 14:18
 */

namespace GestionTransportBundle\Controller;


use GestionTransportBundle\Entity\Demande;
use GestionTransportBundle\Form\UserAjouterDemandeType;
use GestionTransportBundle\Form\UserModifierDemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class UserDemandeController extends Controller
{

    public function userAjoutDemandeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $x = $this->getUser();
        $d = new Demande();

        $userCars = $em->getRepository('GestionTransportBundle:Vehicules')->findBy(array('idUser' => $x));


        $Form = $this->createForm(UserAjouterDemandeType::class, $d,['user' => $x]);


        $Form->handleRequest($request);
        if ($Form->isValid()) {
            //  $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $d->setIdUser($user);
            $d->setNbPlacesDispo($d->getIdVehicule()->getNbPlaces());

            // récuperer la date systéme et la date de match et les comparer afin de vérifier la date avant d'ajouter la demande de covoiturage

            /*   $datematch = ($d->getDateMatch()-> format("Y-m-d"));
               $to   = new \DateTime();
               $rrr=$to->format("Y-m-d");  */


            $em->persist($d);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Votre offre de covoiturage ajoutée avec succés');
            return $this->redirectToRoute('UserListDemande');
        }

        return $this->render('GestionTransportBundle:Default:UserAjoutDemande.html.twig', array('f' => $Form->createView()));
    }

    public function userListeDemandeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $x = $this->getUser();
        $d = $em->getRepository(Demande::class)->findBy(array('idUser' => $x));
        return $this->render('GestionTransportBundle:Default:UserListeDemande.html.twig',
            array(
                'v' => $d
            ));
    }

    public function userSupprimerDemandeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $v = $em->getRepository("GestionTransportBundle:Demande")->find($id);
        $em->remove($v);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice', 'Votre offre de covoiturage supprimé avec succés');
        return $this->redirectToRoute('UserListDemande');
    }

    public function userModifierDemandeAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $vh = $em->getRepository("GestionTransportBundle:Demande")->find($id);


        $Form = $this->createForm(UserModifierDemandeType::class, $vh);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();
            $vh->setIdUser($user);

            $em->persist($vh);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'Votre offre de covoiturage modifiée avec succés');
            return $this->redirectToRoute('UserListDemande');
        }
        return $this->render("GestionTransportBundle:Default:UserUpdateDemande.html.twig",
            array(
                'form' => $Form->createView()));

    }


}