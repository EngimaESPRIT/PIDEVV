<?php
/**
 * Created by PhpStorm.
 * User: Rusty
 * Date: 08/02/2018
 * Time: 22:11
 */

namespace GestionEJBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

use GestionEJBundle\Entity\Equipe;
use GestionEJBundle\Form\AjoutEquipe;
use GestionEJBundle\Form\AjoutJoueur;
use Symfony\Component\HttpFoundation\Request;
use MyApp\UserBundle\Entity\User;
use Symfony\Component\Serializer\DependencyInjection\SerializerPass;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class EquipeController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    public function GoToAjoutEquipeAction(Request $request)
    {

        $m=new Equipe();
        $form=$this->createForm(AjoutEquipe::class,$m);
        $form->handleRequest($request);
        $d=new Equipe();
        $var=0;
        $em = $this->getDoctrine()->getManager();

        $model = $em->getRepository("GestionEJBundle:Equipe")->findAll();
$t=false;
$v=false;
        foreach ($model as $d)
        {
            $var=$var+1;
        }
       foreach ($model as $d)
       {
           if ($d->getEntraineur()==$m->getEntraineur())
           {
               $t=true;
           }
           if ($d->getClassementfifa()==$m->getClassementfifa())

           {
               $v=true;
           }
       }
        echo $var;
        if ($form->isValid())
        {
if ($var<32) {
    if ($m->getParticipations()<=21 && $m->getParticipations()>=0) {
        if ($t==false) {
if ($m->getMatchlosses()>=0 and $m->getMatchdraws()>=0 and $m->getButscm()>=0 and $m->getClassementfifa()>=1) {
    if ($v==false) {
        $m->setMatchescm($m->getMatchwins() + $m->getMatchdraws() + $m->getMatchlosses());
        $file = $m->getDrapeau();
        $fileName = $m->getNom() . 'Drapeau' . '.' . $file->guessExtension();
        $file->move(
            $this->getParameter('Equipes_directory'),
            $fileName
        );
        $file1 = $m->getPhotoequipe();
        $fileName1 = $m->getNom() . 'Equipe' . '.' . $file1->guessExtension();
        $file1->move(
            $this->getParameter('Equipes_directory'),
            $fileName1
        );
        $m->setDrapeau($fileName);
        $m->setPhotoequipe($fileName1);
        $file2 = $m->getLogo();
        $fileName2 = $m->getNom() . 'Logo' . '.' . $file2->guessExtension();
        $file2->move(
            $this->getParameter('Equipes_directory'),
            $fileName2
        );
        $m->setLogo($fileName2);
        $em = $this->getDoctrine()->getManager();

        $em->persist($m);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice', 'Ajout avec succees');
    }
    else
    {
        $this->get('session')->getFlashBag()->add('error', 'Echoué:Une Equipe A deja ce classement');

    }

}

else
{
    $this->get('session')->getFlashBag()->add('error', 'Echoué:Victoires ou Defaites ou classement fifa negative');

}
        }
        else
            {
                $this->get('session')->getFlashBag()->add('error', 'Echoué:Cet Entraineur a deja une equipe');

            }
        }
    else
    {
        $this->get('session')->getFlashBag()->add('error', 'Echoué:Attention il ya eu que 21 CMs');

    }
}
else
{
    $this->get('session')->getFlashBag()->add('error', 'Echoué:Attention! La Coupe du monde ne contient que 32 equipes');

}
        }
        return $this->render('@GestionEJ/TemplateAdmin/ajouterequipe.html.twig',array('form'=>$form->createView()));

    }
    public function GoToAfficheEquipeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Equipe")->findAll();
        return $this->render('@GestionEJ/TemplateAdmin/afficherEquipes.html.twig', array('m' => $model));
    }
    public function GoToTeamsAction()
    {
            $em = $this->getDoctrine()->getManager();


            $stades = $em->getRepository("GestionEJBundle:Stade")->findAll();
            $model = $em->getRepository("GestionEJBundle:Equipe")->findAll();
            return $this->render('GestionEJBundle:template 2:teams.html.twig', array('m' => $model,'s'=>$stades));




    }
    public function GoToTeamAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $model = $em->getRepository("GestionEJBundle:Equipe")->find($request->get('id'));
        $joueurs = $em->getRepository("GestionEJBundle:Joueur")->findBy(array("idEquipe"=>$request->get('id')));
        $matches = $em->getRepository("GestionMatchBundle:Matches")->TrouverMatches($request->get('id'));



        $stades = $em->getRepository("GestionEJBundle:Stade")->findAll();
        return $this->render('GestionEJBundle:template 2:single-team.html.twig', array('m' => $model,'j'=>$joueurs,'s'=>$stades,'ma'=>$matches));
    }
    public function GoToSuppEquipeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Equipe")->find($request->get('id'));
        $model=$em->merge($model);
        $em->remove($model);
        $em->flush();
        $this->get('session')->getFlashBag()->add('notice','Suppression avec succees');


        return $this->redirectToRoute('AfficheEquipe');
}
    public function GoToModifEquipeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository("GestionEJBundle:Equipe")->find($request->get('id'));
        $form=$this->createForm(AjoutEquipe::class,$model);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $file=$model->getDrapeau();
            $fileName = $model->getNom().'Drapeau'.'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('Equipes_directory'),
                $fileName
            );
            $file1=$model->getPhotoequipe();
            $fileName1 = $model->getNom().'Equipe'.'.'.$file1->guessExtension();
            $file1->move(
                $this->getParameter('Equipes_directory'),
                $fileName1
            );
            $model->setDrapeau($fileName);
            $model->setPhotoequipe($fileName1);
            $file2=$model->getLogo();
            $fileName2 = $model->getNom().'Logo'.'.'.$file2->guessExtension();
            $file2->move(
                $this->getParameter('Equipes_directory'),
                $fileName2
            );
            $model->setLogo($fileName2);
            $em->persist($model);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Modification avec succees');

            return $this->redirectToRoute('AfficheEquipe');
        }
        return $this->render('@GestionEJ/TemplateAdmin/modifEquipe.html.twig',array('m'=>$model,'form'=>$form->createView(),'id'=>$request->get('id')
        ));

    }
    public function equipeFavoriteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if ( $request->isXmlHttpRequest()) {
$a=$this->getUser();
$id=$request->get('id');
echo $id;
            $joueurs = $em->getRepository("GestionEJBundle:Equipe")->find($id);
            $a->setEquipefavorite($joueurs);
            $em->persist($a);
$em->flush();


return new JsonResponse();

        }

    }
}