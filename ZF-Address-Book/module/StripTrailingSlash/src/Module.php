<?php

namespace StripTrailingSlash;


use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManager;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements \Zend\ModuleManager\Feature\BootstrapListenerInterface, ConfigProviderInterface
{

    public function onBootstrap(EventInterface $e)
    {
        /** @var $eventManager EventManager */
        /** @var $e MvcEvent */
        $eventManager = $e->getApplication()->getEventManager();
        $serviceManager = $e->getApplication()->getServiceManager();
        $config = $serviceManager->get('Config');

        $redirect = $config['strip_trailing_slash']['redirect'];

        $eventManager->attach(MvcEvent::EVENT_ROUTE, function (MvcEvent $e) use ($redirect) {
            /** @var $request Request */
            $request = $e->getRequest();

            if ($redirect && substr($request->getUriString(), -1) === '/') {
                $url = rtrim($request->getUri(), '/');
                $response = new Response();
                $response->setStatusCode(301);
                $response->getHeaders()->addHeaderLine('Location', $url);
                return $response;
            }


            $request->setUri(rtrim($request->getUri(), '/'));

        }, 100);
    }


    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

}