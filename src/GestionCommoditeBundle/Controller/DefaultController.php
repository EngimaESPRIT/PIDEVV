<?php

namespace GestionCommoditeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionCommoditeBundle:TemplateService:news-left-sidebar.html.twig');
    }
    public function index2Action()
    {
        return $this->render('GestionCommoditeBundle:TemplateService:news-left-sidebar.html.twig');
    }
}
