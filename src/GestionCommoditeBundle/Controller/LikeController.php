<?php

namespace GestionCommoditeBundle\Controller;

use GestionCommoditeBundle\Entity\Like;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{
    public function likeAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $like = new Like();
        $like->setUser($this->getUser());
        $like->setCommodite($em->getRepository('GestionCommoditeBundle:Commodite')->find($id));
        //$like = $em->getRepository('GestionCommoditeBundle:Like')->findOneBy(['commodite'=>$id,'user'=>$this->getUser()]);
        $em->persist($like);
        $em->flush();
        return $this->redirectToRoute('commoditefront_showcomm', ['idCommodite' => $id]);
    }

    public function dislikeAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $like = $em->getRepository('GestionCommoditeBundle:Like')->findOneBy(['commodite' => $id, 'user' => $this->getUser()]);
        $em->remove($like);
        $em->flush();
        return $this->redirectToRoute('commoditefront_showcomm', ['idCommodite' => $id]);
    }

}
