<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 07/02/2019
 * Time: 16:37
 */

use Nybbl\PartialModule\Service;
use Nybbl\PartialModule\Exception\PartialNotFoundException;

class PartialServiceTest extends ModuleTestCase
{
    protected $sm;
    protected $partialService;

    public function setUp()
    {
        $this->sm = $this->getApplicationInstance()->getServiceManager();

        $factory = new Service\Factory\PartialServiceFactory();
        $this->partialService = $factory($this->sm, Service\PartialService::class);
    }

    public function test_load_partials_by_name_returns_partial()
    {
        $partial = $this->partialService->loadPartialByName('test.twig');
        $this->assertEquals([
            'name'     => 'test.twig',
            'path'     => 'application/test.twig',
            'priority' => 10,
            'group'    => 'app',
        ], $partial);
    }

    public function test_load_partials_by_name_throws_exception_with_invalid_name()
    {
        $this->expectException(PartialNotFoundException::class);
        $this->partialService->loadPartialByName('invalid_name');
    }

    public function test_load_partials_within_range_returns_array()
    {
        $partials = $this->partialService->loadPartialsWithinRange(0,2);
        $this->assertCount(2, $partials);
    }

    public function test_load_partials_within_range_returns_no_items()
    {
        $partials = $this->partialService->loadPartialsWithinRange(0,0);
        $this->assertCount(0, $partials);
    }

    public function test_get_view_renderer_returns_instance()
    {
        $viewRendererInstance = $this->partialService->getViewRenderer();
        $this->assertInstanceOf(\Zend\View\Renderer\RendererInterface::class, $viewRendererInstance);
    }

    public function test_set_invalid_view_renderer_instance_throws_exception()
    {
        $this->expectException(RuntimeException::class);
        $this->partialService->setViewRenderer(PartialServiceTest::class);
    }
}