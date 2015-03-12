<?php

namespace Master\SystemBundle\EventListener;

use Master\SystemBundle\Controller\InitializableController;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class PreControllerListener
{
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        if (!is_array($controller)) return;

        $controller = $controller[0];

        if ($controller instanceof InitializableController) $controller->initialize($event->getRequest());
    }
}