<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */


return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => \Zend\Router\Http\Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => \Application\Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'contact' => [
                'type' => \Zend\Router\Http\Literal::class,
                'options' => [
                    'route' => '/contacts',
                    'defaults' => [
                        'controller' => \Application\Controller\ContactController::class,
                        'action' => 'list',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'add' => [
                        'type' => \Zend\Router\Http\Literal::class,
                        'options' => [
                            'route' => '/ajouter',
                            'defaults' => [
                                'action' => 'add',
                            ],
                        ],
                    ],
                    'show' => [
                        'type' => \Zend\Router\Http\Segment::class,
                        'options' => [
                            'route' => '/:id',
                            'defaults' => [
                                'action' => 'show',
                            ],
                            'constraints' => [
                                'id' => '[1-9][0-9]*'
                            ]
                        ],
                    ],
                    'list-by-company' => [
                        'type' => \Zend\Router\Http\Segment::class,
                        'options' => [
                            'route' => '/societe/:id',
                            'defaults' => [
                                'action' => 'listByCompany',
                            ],
                            'constraints' => [
                                'id' => '[1-9][0-9]*'
                            ]
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            \Application\Controller\IndexController::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \Application\Controller\ContactController::class => function(\Psr\Container\ContainerInterface $sm) {
                $contactService = $sm->get(\Application\Service\ContactServiceInterface::class);
                return new \Application\Controller\ContactController($contactService);
            }
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => false,
        'display_exceptions'       => false,
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'Application\TableGateway\Contact' => function(\Psr\Container\ContainerInterface $sm) {
                $adapter = $sm->get(\Zend\Db\Adapter\AdapterInterface::class);

                return new \Zend\Db\TableGateway\TableGateway('contact', $adapter);
            },
            \Application\Service\ContactZendDbService::class => function(\Psr\Container\ContainerInterface $sm) {
                $gateway = $sm->get('Application\TableGateway\Contact');
                $hydrator = $sm->get('HydratorManager')->get(\Zend\Hydrator\ClassMethods::class);
                return new \Application\Service\ContactZendDbService($gateway, $hydrator);
            }
        ],
        'aliases' => [
            \Application\Service\ContactServiceInterface::class => \Application\Service\ContactZendDbService::class
        ]
    ]
];
