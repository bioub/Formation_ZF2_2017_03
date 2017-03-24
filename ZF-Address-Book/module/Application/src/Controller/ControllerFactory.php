<?php

namespace Application\Controller;


use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Application\Controller\ContactController
        $regex = '/Application\\\\Controller\\\\([A-Za-z]+)Controller/';
        preg_match($regex, $requestedName, $matches);
        $entityName = $matches[1];

        $contactService = $container->get("Application\\Service\\{$entityName}ServiceInterface");
        return new $requestedName($contactService);
    }
}