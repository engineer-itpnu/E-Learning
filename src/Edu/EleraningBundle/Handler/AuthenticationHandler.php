<?php
/**
 * Created by PhpStorm.
 * User: omidnematollahi
 * Date: 12/16/13
 * Time: 1:17 AM
 */

namespace Edu\EleraningBundle\Handler;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AuthenticationHandler implements AuthenticationSuccessHandlerInterface
{

    protected $router;
    protected $security;

    public function __construct(Router $router, SecurityContext $security)
    {
        $this->router = $router;
        $this->security = $security;
    }

    /**
     * This is called when an interactive authentication attempt succeeds. This
     * is called by authentication listeners inheriting from
     * AbstractAuthenticationListener.
     *
     * @param Request $request
     * @param TokenInterface $token
     *
     * @return RedirectResponse never null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if ($this->security->isGranted('ROLE_ADMIN'))
            return new RedirectResponse($this->router->generate('a_main'));

        if ($this->security->isGranted('ROLE_MANAGER'))
            return new RedirectResponse($this->router->generate('m_main'));

        if ($this->security->isGranted('ROLE_TEACHER'))
            return new RedirectResponse($this->router->generate('t_main'));

        if ($this->security->isGranted('ROLE_STUDENT'))
            return new RedirectResponse($this->router->generate('s_main'));

        return new Response("Error");
    }

} 