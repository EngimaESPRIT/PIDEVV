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


use GestionTransportBundle\Form\UserModifierVehiculeType;
use GestionTransportBundle\Form\UserVehiculesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UserVehiculesController extends Controller
{

    public function userAjoutVehiculeAction(Request $request)
    {
        $v = new Vehicules();

        $Form = $this->createForm(UserVehiculesType::class,$v);
        $Form->handleRequest($request);


        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();
            $v->setIdUser($user);

            $mat = $Form->get('immatriculation')->getData();

            $vhexiste = $em->getRepository('GestionTransportBundle:Vehicules')->findBy(array('immatriculation' => $mat));


            if ($vhexiste == null) {


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


                $this->get('session')->getFlashBag()->add('notice', 'Votre Vehicule ajouté avec succés');
                return $this->redirectToRoute('UserListVehicule');

            } else {
                $this->get('session')->getFlashBag()->add('notice', 'Vehicule déja existante');
                return $this->redirectToRoute('UserAjoutVehicule');

            }
        }


        return $this->render('GestionTransportBundle:Default:UserAjoutVehicule.html.twig', array(
            'f' => $Form->createView()));
    }


    /**
     * @return string
     */
    private function generateUniqueFileName()
    {

        return md5(uniqid());
    }


    public function userListeVehiculeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $x=$this->getUser();
        $veh = $em->getRepository(Vehicules::class)->findBy(array('idUser'=>$x));
        return $this->render('GestionTransportBundle:Default:UserListeVehicule.html.twig',
            array(
                'v' => $veh
            ));
    }

    public function userSupprimerVehiculeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $v = $em->getRepository("GestionTransportBundle:Vehicules")->find($id);
        $em->remove($v);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice','Votre Vehicule supprimé avec succéss');
        return $this->redirectToRoute('UserListVehicule');


    }


    public function userModifierVehiculeAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $vh = $em->getRepository("GestionTransportBundle:Vehicules")->find($id);


        $form = $this->createForm(UserModifierVehiculeType::class, $vh);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {




               $user = $this->getUser();

              $vh->setIdUser($user);

            $em->persist($vh);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Votre Vehicule est modifié avec succéss');

            return $this->redirectToRoute('UserListVehicule');

        }

        return $this->render("@GestionTransport/Default/UserUpdateVehicule.html.twig",
            array(
                'form' => $form->createView()));

    }


}