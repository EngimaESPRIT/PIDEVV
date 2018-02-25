<?php
/**
 * Created by PhpStorm.
 * User: Rusty
 * Date: 16/02/2018
 * Time: 23:24
 */

namespace GestionEJBundle\Controller;
use GestionEJBundle\Entity\Equipetype;
use GestionEJBundle\Entity\Joueur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;


class EquipetypeController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
public function AjoutEquipeTypeAction(Request $request)
{
    if ($this->get('security.authorization_checker')->isGranted('ROLE_CLIENT')) {
        $em = $this->getDoctrine()->getManager();


        $stades = $em->getRepository("GestionEJBundle:Stade")->findAll();
        $model = $em->getRepository("GestionEJBundle:Equipetype")->find($this->getUser()->getId());
        if ($model == null) {

            $em = $this->getDoctrine()->getManager();
            $equipe = new Equipetype();


            $model = $em->getRepository("GestionEJBundle:Joueur")->findAll();


            return $this->render('GestionEJBundle:template 2:equipetype.html.twig', array('m' => $model,'s'=>$stades));
        } else {
            return $this->redirectToRoute('AffEquipeType');
        }
    }
    else
    {
        $em = $this->getDoctrine()->getManager();

        $stades = $em->getRepository("GestionEJBundle:Stade")->findAll();
        return $this->redirectToRoute('Erreur',array('s'=>$stades));
    }
}

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function AjoutTypeconfAction(Request $request)
{
    $em = $this->getDoctrine()->getManager();

    $stades = $em->getRepository("GestionEJBundle:Stade")->findAll();
    if ($this->get('security.authorization_checker')->isGranted('ROLE_CLIENT')) {


        $equipe = new Equipetype();
        $model = $em->getRepository("GestionEJBundle:Joueur")->findAll();


        if ($request->isMethod('GET')) {
            echo 'aa';
            echo $request->get("check0");
            $j1 = $em->getRepository("GestionEJBundle:Joueur")->find($request->get("check0"));

            $j2 = $em->getRepository("GestionEJBundle:Joueur")->find($request->get("check1"));
            $j3 = $em->getRepository("GestionEJBundle:Joueur")->find($request->get("check2"));
            $j4 = $em->getRepository("GestionEJBundle:Joueur")->find($request->get("check3"));
            $j5 = $em->getRepository("GestionEJBundle:Joueur")->find($request->get("check4"));
            $j6 = $em->getRepository("GestionEJBundle:Joueur")->find($request->get("check5"));
            $j7 = $em->getRepository("GestionEJBundle:Joueur")->find($request->get("check6"));
            $j8 = $em->getRepository("GestionEJBundle:Joueur")->find($request->get("check7"));
            $j9 = $em->getRepository("GestionEJBundle:Joueur")->find($request->get("check8"));
            $j10 = $em->getRepository("GestionEJBundle:Joueur")->find($request->get("check9"));
            $j11 = $em->getRepository("GestionEJBundle:Joueur")->find($request->get("check10"));


$equipe->setJoueur1($j1);
            $equipe->setJoueur2($j2);
            $equipe->setJoueur3($j3);
            $equipe->setJoueur4($j4);
            $equipe->setJoueur5($j5);
            $equipe->setJoueur6($j6);
            $equipe->setJoueur7($j7);

            $equipe->setJoueur8($j8);
            $equipe->setJoueur9($j9);
            $equipe->setJoueur10($j10);
            $equipe->setJoueur11($j11);














            $equipe->setFormation($request->get('s'));
                $id = $this->get('security.token_storage')->getToken()->getUser();
                $equipe->setUserid($id);
                $em->persist($equipe);
                $em->flush();
                return $this->redirectToRoute('AffEquipeType');
            }
        }

    else
    {
        $this->redirectToRoute('Erreur',array('s'=>$stades));
    }

    }



public function AfficherEquipeTypeAction()
{
    $em = $this->getDoctrine()->getManager();

    $stades = $em->getRepository("GestionEJBundle:Stade")->findAll();

    echo $this->getUser()->getId();
    $model = $em->getRepository("GestionEJBundle:Equipetype")->find($this->getUser()->getId());
    return $this->render('@GestionEJ/template 2/equipetypeconf.html.twig',array('m'=>$model,'s'=>$stades));

}
}