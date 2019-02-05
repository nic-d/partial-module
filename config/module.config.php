<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 07/11/2018
 * Time: 14:23
 */

use Nybbl\PartialModule\View;
use Nybbl\PartialModule\Service;
use Nybbl\PartialModule\Renderer;

return [
    'service_manager' => [
        'factories' => [
            Service\PartialService::class => Service\Factory\PartialServiceFactory::class,
            Renderer\PartialRenderer::class => Renderer\Factory\PartialRendererFactory::class,
        ],

        'aliases' => [
            Service\PartialServiceInterface::class => Service\PartialService::class,
            Renderer\PartialRendererInterface::class => Renderer\PartialRenderer::class,
        ],
    ],

    'view_helpers' => [
        'factories' => [
            View\Helper\PartialViewHelper::class => View\Helper\Factory\PartialViewHelperFactory::class,
        ],

        'aliases' => [
            'partialHelper' => View\Helper\PartialViewHelper::class,
            'partial_helper' => View\Helper\PartialViewHelper::class,
        ],
    ],

    // Check out module.config.php.dist for an example
    // view_renderer is defaulted to PhpRenderer if none is provided
    'partial_module' => [
        'view_renderer' => '',
        'partials' => [],
    ],
];