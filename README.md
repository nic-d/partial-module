# Nybbl Partial Module
ZF3 module that makes it super simple to define and render partials.

## Installation
```
$ composer require nybbl/partial-module
```

## Usage
To use this module, add it to your modules.config.php file:
```php
return [
    ...
    
    'Nybbl\PartialModule',
];
```

## Configuring Partials
There's an example config in the config/module.config.php.dist file, you can copy the contents of
that into each module's config or into a global config. This module supports any templating language, if you provide
a renderer that implements the Zend\View\Renderer\RendererInterface.

```php
'partial_module' => [
    // Specify the FQCN of the view renderer (default is PhpRenderer)
    'view_renderer' => 'ZendTwig\Renderer\TwigRenderer',

    'partials' => [
        [
            'name'     => 'example',
            'path'     => 'application/crud/example.twig',
            'priority' => 1,
            'group'    => 'crud',
        ],
    ],
],
```

Explanations:
- name: The name of the partial, can be anything you want.
- path: The path of the partial on the filesystem.
- priority: The priority / ranking of the partial, the higher the number, the higher the rendering priority.
- group: Essentially namespaces. You can "group" partials together and render them.

## View Usage:
In your view files you can use the view helper:
```php
// Render a single partial using its name - returns a string of the rendered partial
$single = $this->partialHelper()->render('example', ['planet' => 'world']);

// Render multiple (pass the names) - returns array of rendered partials
$multiple = $this->partialHelper()->multiple(['example', 'example_2'], ['planet' => 'world']);

// Render a range (array_slice) - returns array of rendered partials
$range = $this->partialHelper()->range(0,3, ['planet' => 'world']);

// Render a group - returns an array of rendered partials
$group = $this->partialHelper()->group('app', ['planet' => 'world']);

// Render all - returns an array of all rendered partials
$all = $this->partialHelper()->all(['planet' => 'world']);
```