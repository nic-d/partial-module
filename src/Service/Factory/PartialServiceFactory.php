<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 05/02/2019
 * Time: 10:13
 */

namespace Nybbl\PartialModule\Service\Factory;

use Interop\Container\ContainerInterface;
use Nybbl\PartialModule\Service\PartialService;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class PartialServiceFactory
 * @package Nybbl\PartialModule\Service\Factory
 */
class PartialServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|PartialService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config')['partial_module'];
        return new PartialService($container, $config);
    }
}