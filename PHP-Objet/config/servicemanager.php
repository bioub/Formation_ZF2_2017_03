<?php
use Orsys\Injection\FileLogger;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

$serviceManager = new ServiceManager([
    'factories' => [
        FileLogger::class => InvokableFactory::class,
        'app' => function(ServiceLocatorInterface $sm) {
            $application = new \Orsys\Injection\Application();
            $application->setLogger($sm->get(FileLogger::class));
            return $application;
        }
    ],
]);