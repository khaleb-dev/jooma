<?php
/**
 * @link        https://publogger.khaleb.dev
 * @copyright   Copyright (c) 2021 Publogger
 * @license     MIT License    
 */

declare(strict_types=1);

namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Application\Controller\ApiController;
use Application\Service\ApiManager;
use Application\CustomObject\Utility;

/**
 * This is the factory class for ApiController. The purpose of the factory
 * is to instantiate the service and pass it dependencies (inject dependencies).
 */
class ApiControllerFactory
{
    /**
     * This method creates the ApiController and returns its instance. 
     */
    public function __invoke(ContainerInterface $container) : ApiController
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $apiManager = $container->get(ApiManager::class);
        $utility = new Utility();
        
        return new ApiController($entityManager, $apiManager, $utility);
    }
}
