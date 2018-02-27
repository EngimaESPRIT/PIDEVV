<?php

namespace GestionActualiteBundle\Controller;

use GestionActualiteBundle\GestionActualiteBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LiensController extends Controller
{


    public function GoToCommentViewAction()
    {
        return $this->render('Posts.html.twig');
    }

    public function GoToPostAddAction()
    {
        return $this->render('GestionActualiteBundle:TemplateBK:form_validation.html.twig');
    }

    public function GoToPostAdminAction()
    {
        return $this->render('GestionActualiteBundle:TemplateBK:Posts.html.twig') ;
    }

    public function GoToPost_detailAction()
    {
        return$this->render('GestionActualiteBundle:TemplateFT:single-news.html.twig') ;
    }




}
