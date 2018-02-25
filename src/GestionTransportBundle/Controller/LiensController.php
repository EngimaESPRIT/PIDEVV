<?php
/**
 * Created by PhpStorm.
 * User: SAFI
 * Date: 13/02/2018
 * Time: 15:52
 */

namespace GestionTransportBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class LiensController extends Controller
{
    public function GoToAdminAction(Request $request)
    {
        $user = $this->getUser();
        if (isset($user))
            //  $redirection = new RedirectResponse($this->router->generate('admin'));
            return $this->render('@GestionEJ/TemplateAdmin/index.html.twig');
        else
            return $this->render('GestionTransportBundle:ClientTemplate:page-404.html.twig');
    }
    public function GoToTransportAction()
    {
        return $this->render('@GestionTransport/transport.html.twig');
    }


    public function GoTo404Action()
    {
        return $this->render('GestionTransportBundle:ClientTemplate:page-404.html.twig');
    }

    public function GoToHomeAction()
    {
        return $this->render('@GestionTransport/ClientTemplate/index.html.twig');

    }










}