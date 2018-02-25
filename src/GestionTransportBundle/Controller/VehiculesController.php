<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 10/02/2018
 * Time: 20:34
 */

namespace GestionTransportBundle\Controller;


use GestionTransportBundle\Entity\Vehicules;
use GestionTransportBundle\Form\ModifierVehiculesType;
use GestionTransportBundle\Form\VehiculesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class VehiculesController extends Controller
{

    public function ajoutVehiculeAction(Request $request)
    {
        $v = new Vehicules();

        $Form = $this->createForm(VehiculesType::class, $v);
        $Form->handleRequest($request);


        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();


        $mat=$Form->get('immatriculation')->getData();

           $vhexiste = $em->getRepository('GestionTransportBundle:Vehicules')->findBy(array('immatriculation' => $mat));


            if($vhexiste == null) {

                //licence plate image now
                $file = $v->getImageCarteGrise();


                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName);
                $v->setImageCarteGrise($fileName);


                // car image now
                $file1 = $v->getImageVehicule();
                $car = $v->getImmatriculation() . '.' . $file1->guessExtension();
                $file1->move($this->getParameter('images_directory'), $car);
                $v->setImageVehicule($car);

                $em->persist($v);
                $em->flush();


                $this->get('session')->getFlashBag()->add('notice', 'Vehicule ajouté avec succéss');
                return $this->redirectToRoute('lister_vehicule');

            }

            else
            {
                $this->get('session')->getFlashBag()->add('notice', 'Vehicule déja existant');
            return $this->redirectToRoute('ajouter_vehicule');

            }

        }

        return $this->render('GestionTransportBundle:Default:ajoutVehicule.html.twig', array(
            'f' => $Form->createView()));
    }


    /**
     * @return string
     */
    private function generateUniqueFileName()
    {

        return md5(uniqid());
    }


    public function listeVehiculeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $veh = $em->getRepository(Vehicules::class)->findAll();
        return $this->render('GestionTransportBundle:Default:listeVehicule.html.twig',
            array(
                'v' => $veh
            ));
    }

    public function supprimerVehiculeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $v = $em->getRepository("GestionTransportBundle:Vehicules")->find($id);
        $em->remove($v);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice', 'Vehicule supprimé');
        return $this->redirectToRoute('lister_vehicule');
    }


    public function modifierVehiculeAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $vh = $em->getRepository("GestionTransportBundle:Vehicules")->find($id);


        $form = $this->createForm(ModifierVehiculesType::class, $vh);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            //   $user = $this->getUser();
            //  $vh->setIdUser($user);

            $em->persist($vh);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'Vehicule modifié');

            return $this->redirectToRoute('lister_vehicule');
        }

        return $this->render("@GestionTransport/Default/updateVehicule.html.twig",
            array(
                'form' => $form->createView()));

    }


}