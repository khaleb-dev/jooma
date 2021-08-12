<?php
/**
 * @link        https://publogger.khaleb.dev
 * @copyright   Copyright (c) 2021 Publogger
 * @license     MIT License    
 */

declare(strict_types=1);

namespace Application;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Laminas\Router\Http\Hostname;
use Laminas\ServiceManager\Factory\InvokableFactory;

$domainParts = explode(".",$_SERVER['SERVER_NAME']);
if($domainParts[0] == 'api' || $domainParts[0] == 'admin'){
    unset($domainParts[0]);
}
$domainName = count($domainParts) > 1 ? implode('.', $domainParts) : implode('', $domainParts);

return [
    'router' => [
        'routes' => [
            'web' => [
                'type' => Hostname::class,
                'options' => [
                    'route' => $domainName,
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'home' => [
                        'type'    => Literal::class,
                        'options' => [
                            'route'    => '/',
                            'defaults' => [
                                'controller' => Controller\WebController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],
                    'contact' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/contact',
                            'defaults' => [
                                'controller' => Controller\WebController::class,
                                'action'     => 'contact',
                            ],
                        ],
                    ],
                    'about' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/about',
                            'defaults' => [
                                'controller' => Controller\WebController::class,
                                'action'     => 'about',
                            ],
                        ],
                    ],
                ],
            ],
            'app' => [
                'type' => Hostname::class,
                'options' => [
                    'route' => 'admin.'.$domainName,
                    'defaults' => [
                        'controller' => Controller\AppController::class,
                        'action'     => 'dashboard',
                    ],
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'app-home' => [
                        'type'    => Literal::class,
                        'options' => [
                            'route'    => '/',
                            'defaults' => [
                                'controller' => Controller\AppController::class,
                                'action'     => 'dashboard',
                            ],
                        ],
                    ],
                    'dashboard' => [
                        'type'    => Literal::class,
                        'options' => [
                            'route'    => '/dashboard',
                            'defaults' => [
                                'controller' => Controller\AppController::class,
                                'action'     => 'dashboard',
                            ],
                        ],
                    ],
                    'manage-tags' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/manage/tags[/:id]',
                            'constraints' => [
                                'id' => '[a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                'controller'    => Controller\AppController::class,
                                'action'        => 'manage-tags',
                            ],
                        ],
                    ],
                    'manage-groups' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/manage/groups[/:id]',
                            'constraints' => [
                                'id' => '[a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                'controller'    => Controller\AppController::class,
                                'action'        => 'manage-groups',
                            ],
                        ],
                    ],
                    'create-post' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/create/post',
                            'defaults' => [
                                'controller'    => Controller\AppController::class,
                                'action'        => 'create-post',
                            ],
                        ],
                    ],
                    'manage-posts' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/manage/posts[/:id]',
                            'constraints' => [
                                'id' => '[a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                'controller'    => Controller\AppController::class,
                                'action'        => 'manage-posts',
                            ],
                        ],
                    ],
                    'post-preview' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/preview[/:slug]',
                            'constraints' => [
                                'slug' => '[a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                'controller'    => Controller\AppController::class,
                                'action'        => 'preview',
                            ],
                        ],
                    ],
                    'auth' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/auth',
                            'constraints' => [
                                'id' => '[a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                'controller'    => Controller\AppController::class,
                                'action'        => 'auth',
                            ],
                        ],
                    ],
                ],
            ],
            'api' => [
                'type' => Hostname::class,
                'options' => [
                    'route' => 'admin.'.$domainName,
                    'defaults' => [
                        'controller' => Controller\ApiController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'api-home' => [
                        'type'    => Literal::class,
                        'options' => [
                            'route'    => '/',
                            'defaults' => [
                                'controller' => Controller\ApiController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],
                    'api-action' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/v1/:action[/:id]',
                            'constraints' => [
                                'api-key' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                'controller'    => Controller\ApiController::class,
                                'action'        => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\WebController::class => Controller\Factory\WebControllerFactory::class,
            Controller\AppController::class => Controller\Factory\AppControllerFactory::class,
            Controller\ApiController::class => Controller\Factory\ApiControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\WebManager::class => Service\Factory\WebManagerFactory::class,
            Service\AppManager::class => Service\Factory\AppManagerFactory::class,
            Service\ApiManager::class => Service\Factory\ApiManagerFactory::class,
        ],
    ],
    // We register module-provided controller plugins under this key.
    'controller_plugins' => [
        'factories' => [
            Auth\AuthPlugin::class => Auth\Factory\AuthPluginFactory::class,
        ],
        'aliases' => [
            'auth' => Auth\AuthPlugin::class,
        ],
    ],
    'view_helpers' => [
        'factories' => [
            View\Helper\BackOfficeMenu::class => InvokableFactory::class,                  
        ],
       'aliases' => [
            'backOfficeMenu' => View\Helper\BackOfficeMenu::class,
       ]
    ],
    // The following registers our custom view 
    // helper classes in view plugin manager.
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'Application/web/index'   => __DIR__ . '/../view/Application/web/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'strategies'  => [
            'ViewJsonStrategy',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ],
            ],
        ],
    ],
];
