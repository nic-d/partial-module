<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 07/11/2018
 * Time: 14:23
 */

namespace Nybbl\PartialModule;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Class Module
 * @package Partial
 */
class Module implements ConfigProviderInterface
{
    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}