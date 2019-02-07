<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 07/02/2019
 * Time: 16:06
 */

return [
    'modules' => [
        'Zend\Router',
        'Nybbl\PartialModule',
    ],

    'module_listener_options' => [
        'config_glob_paths' => [
            __DIR__ . '/../config/module.config.php',
            __DIR__ . '/module.config.php',
        ],

        'module_paths' => [],
    ],
];