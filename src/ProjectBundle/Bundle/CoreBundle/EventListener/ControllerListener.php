<?php

namespace ProjectBundle\Bundle\CoreBundle\EventListener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class ControllerListener
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

    /**
     * Fired when controller has been setup
     *
     * @param FilterControllerEvent $event
     * @return mixed
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        if(!is_array($controller)) {
            return;
        }

        if (method_exists($controller[0], 'init')) {
            $controller[0]->init();
        }
    }
}