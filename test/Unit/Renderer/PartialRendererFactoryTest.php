<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 07/02/2019
 * Time: 16:21
 */

use Nybbl\PartialModule\Renderer;

class PartialRendererFactoryTest extends ModuleTestCase
{
    protected $sm;

    public function setUp()
    {
        $this->sm = $this->getApplicationInstance()->getServiceManager();
    }

    public function test_factory_returns_instance_of_partial_renderer()
    {
        $factory = new Renderer\Factory\PartialRendererFactory();
        $partialRenderer = $factory($this->sm, Renderer\PartialRenderer::class);

        $this->assertInstanceOf(Renderer\PartialRenderer::class, $partialRenderer);
    }

    public function test_factory_returns_implementation_of_interface()
    {
        $factory = new Renderer\Factory\PartialRendererFactory();
        $partialRenderer = $factory($this->sm, Renderer\PartialRenderer::class);

        $this->assertInstanceOf(Renderer\PartialRendererInterface::class, $partialRenderer);
    }
}