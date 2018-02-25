<?php

namespace GestionShopBundle\Controller;

use GestionShopBundle\Entity\Document;
use GestionShopBundle\Entity\Produits;
use GestionShopBundle\Form\ProduitsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionShopBundle:Default:index.html.twig');
    }


    public function MatchAction()
    {
        return $this->render('GestionShopBundle::Ticket.html.twig');
    }
}
