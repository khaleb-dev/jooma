<?php
/**
 * @link        https://publogger.khaleb.dev
 * @copyright   Copyright (c) 2021 Publogger
 * @license     MIT License    
 */

declare(strict_types=1);

namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Application\Controller\AppController;
use Application\Service\AppManager;
use Application\CustomObject\Utility;

/**
 * This is the factory class for AppController. The purpose of the factory
 * is to instantiate the service and pass it dependencies (inject dependencies).
 */
class AppControllerFactory
{
    /**
     * This method creates the AppController and returns its instance. 
     */
    public function __invoke(ContainerInterface $container) : AppController
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $appManager = $container->get(AppManager::class);
        $utility = new Utility();
        
        return new AppController($entityManager, $appManager, $utility);
    }
}
