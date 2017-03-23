<?php

namespace Application\Service;

use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;
use Zend\ServiceManager\Factory\FactoryInterface;

class ContactZendDbServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $gateway = $container->get('Application\TableGateway\Contact');
        $hydrator = $container->get('HydratorManager')->get(ClassMethods::class);
        return new ContactZendDbService($gateway, $hydrator);
    }
}