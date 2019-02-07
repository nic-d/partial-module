<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 07/02/2019
 * Time: 16:09
 */

class PartialViewHelperFactoryTest extends ModuleTestCase
{
    protected $sm;

    public function setUp()
    {
        $this->sm = $this->getApplicationInstance()->getServiceManager();
    }

    public function test_factor_returns_partial_view_helper()
    {
        $factory = new \Nybbl\PartialModule\View\Helper\Factory\PartialViewHelperFactory();
        $partialViewHelper = $factory($this->sm, \Nybbl\PartialModule\View\Helper\PartialViewHelper::class);

        $this->assertInstanceOf(\Nybbl\PartialModule\View\Helper\PartialViewHelper::class, $partialViewHelper);
    }
}