<?php
/**
 * @link        https://publogger.khaleb.dev
 * @copyright   Copyright (c) 2021 Publogger
 * @license     MIT License    
 */

declare(strict_types=1);

namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Application\Controller\WebController;
use Application\Service\WebManager;
use Application\CustomObject\Utility;

/**
 * This is the factory class for WebController. The purpose of the factory
 * is to instantiate the service and pass it dependencies (inject dependencies).
 */
class WebControllerFactory
{
    /**
     * This method creates the WebController and returns its instance. 
     */
    public function __invoke(ContainerInterface $container) : WebController
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $webManager = $container->get(WebManager::class);
        $utility = new Utility();
        
        return new WebController($entityManager, $webManager, $utility);
    }
}
