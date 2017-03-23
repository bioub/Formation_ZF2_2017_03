<?php

namespace Application\Controller;


use Application\Service\ContactServiceInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ContactControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $contactService = $container->get(ContactServiceInterface::class);
        return new ContactController($contactService);
    }
}