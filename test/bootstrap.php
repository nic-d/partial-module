<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 07/02/2019
 * Time: 16:03
 */

// Make errors more obvious during testing
error_reporting(E_ALL | E_STRICT);

require __DIR__ . '/../vendor/autoload.php';

class ModuleTestCase extends \PHPUnit\Framework\TestCase
{
    public function getApplicationInstance()
    {
        $config = include __DIR__ . '/test.config.php';
        return \Zend\Mvc\Application::init($config);
    }
}