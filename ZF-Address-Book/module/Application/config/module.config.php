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
            'societe' => [
                'type' => \Zend\Router\Http\Literal::class,
                'options' => [
                    'route' => '/societes',
                    'defaults' => [
                        'controller' => \Application\Controller\SocieteController::class,
                        'action' => 'list'
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
            \Application\Controller\SocieteController::class => \Application\Controller\ControllerFactory::class,
            \Application\Controller\ContactController::class => \Application\Controller\ControllerFactory::class
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
            'Application\TableGateway\Contact' => \Application\Gateway\ContactGatewayFactory::class,
            \Application\Service\ContactZendDbService::class => \Application\Service\ContactZendDbServiceFactory::class,
            \Application\Service\ContactDoctrineORMService::class => \Application\Service\DoctrineORMServiceFactory::class,
            \Application\Service\SocieteDoctrineORMService::class => \Application\Service\DoctrineORMServiceFactory::class
        ],
        'aliases' => [
            \Application\Service\ContactServiceInterface::class => \Application\Service\ContactDoctrineORMService::class,
            'Application\Service\SocieteServiceInterface' => \Application\Service\SocieteDoctrineORMService::class
        ]
    ]
];
