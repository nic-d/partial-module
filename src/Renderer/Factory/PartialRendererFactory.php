<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 05/02/2019
 * Time: 11:23
 */

namespace Nybbl\PartialModule\Renderer\Factory;

use Interop\Container\ContainerInterface;
use Nybbl\PartialModule\Renderer\PartialRenderer;
use Zend\ServiceManager\Factory\FactoryInterface;
use Nybbl\PartialModule\Service\PartialServiceInterface;

/**
 * Class PartialRendererFactory
 * @package Nybbl\PartialModule\Renderer\Factory
 */
class PartialRendererFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|PartialRenderer
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PartialRenderer($container->get(PartialServiceInterface::class));
    }
}