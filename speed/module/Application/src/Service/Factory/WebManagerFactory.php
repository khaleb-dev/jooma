<?php
/**
 * @link        https://publogger.khaleb.dev
 * @copyright   Copyright (c) 2021 Publogger
 * @license     MIT License    
 */

declare(strict_types=1);

namespace Application\Service\Factory;

use Interop\Container\ContainerInterface;
use Application\Service\WebManager;
use Application\CustomObject\Utility;

/**
 * This is the factory class for WebManager service. The purpose of the factory
 * is to instantiate the service and pass it dependencies (inject dependencies).
 */
class WebManagerFactory
{
    /**
     * This method creates the WebManager service and returns its instance. 
     */

    public function __invoke(ContainerInterface $container) : WebManager
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $utility = new Utility();
        
        return new WebManager($entityManager, $utility);
    }
}
