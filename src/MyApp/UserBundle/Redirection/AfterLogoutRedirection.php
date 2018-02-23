<?php
/**
 * Created by PhpStorm.
 * User: Rusty
 * Date: 19/02/2018
 * Time: 23:28
 */

namespace MyApp\UserBundle\Redirection;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class AfterLogoutRedirection implements LogoutSuccessHandlerInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @var \Symfony\Component\Security\Core\Authorization\AuthorizationChecker
     */
    private $security;

    /**
     * @param AuthorizationChecker $security
     */
    public function __construct(RouterInterface $router, AuthorizationChecker $security)
    {
        $this->router = $router;
        $this->security = $security;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function onLogoutSuccess(Request $request)
    {

            $response = new RedirectResponse($this->router->generate('home'));

        return $response;
    }
}