<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 07/02/2019
 * Time: 16:29
 */

use Nybbl\PartialModule\Service;

class PartialServiceFactoryTest extends ModuleTestCase
{
    protected $sm;

    public function setUp()
    {
        $this->sm = $this->getApplicationInstance()->getServiceManager();
    }

    public function test_factory_returns_instance_of_partial_service()
    {
        $factory = new Service\Factory\PartialServiceFactory();
        $partialRenderer = $factory($this->sm, Service\PartialService::class);

        $this->assertInstanceOf(Service\PartialService::class, $partialRenderer);
    }

    public function test_factory_returns_implementation_of_interface()
    {
        $factory = new Service\Factory\PartialServiceFactory();
        $partialRenderer = $factory($this->sm, Service\PartialService::class);

        $this->assertInstanceOf(Service\PartialServiceInterface::class, $partialRenderer);
    }
}