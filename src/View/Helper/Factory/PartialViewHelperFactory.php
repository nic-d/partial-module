<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 05/02/2019
 * Time: 09:56
 */

namespace Nybbl\PartialModule\View\Helper\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Nybbl\PartialModule\View\Helper\PartialViewHelper;
use Nybbl\PartialModule\Renderer\PartialRendererInterface;

/**
 * Class PartialViewHelperFactory
 * @package Nybbl\PartialModule\View\Helper\Factory
 */
class PartialViewHelperFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|PartialViewHelper
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PartialViewHelper($container->get(PartialRendererInterface::class));
    }
}