<?php

namespace ProjectBundle\Bundle\CoreBundle\EventListener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        if ($this->isSslEnforced() && !$request->isSecure()) {
            $request->server->set('HTTPS', true);
            $request->server->set('SERVER_PORT', 443);
            $event->setResponse(new RedirectResponse($request->getUri()));
        }
    }

    protected function isSslEnforced()
    {
        if ($this->container->hasParameter('enforce_ssl')) {
            if ($this->container->getParameter('enforce_ssl')) {
                return true;
            }
        }

        return false;
    }
}