<?php

namespace Tutorial;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\Router\Http\Regex;
use Zend\Router\Http\Method;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'tutorial' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/tutorial',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'sample' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/sample[/:action]',
                            'constraints'    => [
                                'action' => '[a-z]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\SampleController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],

                    /*'product' => [
                        'type' => Regex::class,
                        'options' => [
                            'regex' => '/product(/(?<action>[a-z]+)(/(?<id>[0-9]+))?)?',
                            'spec'  => "/product/%action%",
                            'constraints'    => [
                                'action' => '[a-z]+',
                                'id'     => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\ProductController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],*/

                    /*'product' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/product[/:action][/:id]',
                            'constraints'    => [
                                'action' => '[a-z]+',
                                'id'     => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\ProductController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],*/

                    'product' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/product',
                            'defaults' => [
                                'controller' => Controller\ProductController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],

                    'productActionAdd' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/product/add',
                        ],
                        'child_routes' => [
                            'productAddGet' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'get',
                                    'defaults' => [
                                        'controller' => Controller\ProductController::class,
                                        'action'     => 'add',
                                    ],
                                ],
                            ],
                            'productAddPost' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'post',
                                    'defaults' => [
                                        'controller' => Controller\ProductController::class,
                                        'action'     => 'addPost',
                                    ],
                                ],
                            ],
                        ],
                    ],

                    'productActionEdit' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/product/edit[/:id]',
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                        ],
                        'child_routes' => [
                            'productEditGet' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'get',
                                    'defaults' => [
                                        'controller' => Controller\ProductController::class,
                                        'action'     => 'edit',
                                    ],
                                ],
                            ],
                            'productEditPost' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'post',
                                    'defaults' => [
                                        'controller' => Controller\ProductController::class,
                                        'action'     => 'editPost',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\IndexController::class => InvokableFactory::class,
            Controller\SampleController::class  => InvokableFactory::class,
            Controller\ProductController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'tutorial/index/index' => __DIR__ . '/../view/tutorial/index/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
