<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 04/02/2019
 * Time: 16:56
 */

namespace Nybbl\PartialModule\Service;

use Psr\Container\ContainerInterface;
use Zend\View\Renderer\RendererInterface;
use Nybbl\PartialModule\Exception\GroupNotFoundException;
use Nybbl\PartialModule\Exception\PartialNotFoundException;

/**
 * Class PartialService
 * @package Nybbl\PartialModule\Service
 */
class PartialService implements PartialServiceInterface
{
    /** @var array $partials */
    private $partials = [];

    /** @var array $config */
    private $config;

    /** @var RendererInterface $renderer */
    protected $renderer;

    /** @var ContainerInterface $container */
    private $container;

    /**
     * PartialService constructor.
     * @param ContainerInterface $container
     * @param array $config
     */
    public function __construct(ContainerInterface $container, array $config = [])
    {
        $this->config = $config;
        $this->container = $container;
        $viewRenderer = $config['view_renderer'];

        // Set the viewRenderer to the fallback if we don't have a valid one passed
        if (!empty($viewRenderer) && !is_null($viewRenderer) && (class_implements($viewRenderer, RendererInterface::class))) {
            $this->setViewRenderer($viewRenderer);
        } else {
            $this->setViewRenderer('Zend\View\Renderer\PhpRenderer');
        }

        // Set the templates after sorting them by priority
        $this->partials = $this->sortPartialsByPriority($config['partials']);
    }

    /**
     * @param string $partialName
     * @return array
     * @throws PartialNotFoundException
     */
    public function loadPartialByName(string $partialName): array
    {
        foreach ($this->partials as $partial) {
            if ($partial['name'] === $partialName) {
                return $partial;
            }
        }

        throw new PartialNotFoundException(sprintf('Partial "%s" not found in the configured partial_module', $partialName));
    }

    /**
     * @param int $start
     * @param int $end
     * @return array
     */
    public function loadPartialsWithinRange(int $start, int $end): array
    {
        return array_slice($this->partials, $start, $end, true);
    }

    /**
     * @param string $groupName
     * @return array
     * @throws GroupNotFoundException
     */
    public function loadPartialsByGroupName(string $groupName): array
    {
        $groupPartials = [];

        foreach ($this->partials as $partial) {
            if (isset($partial['group']) && $partial['group'] === $groupName) {
                $groupPartials[] = $partial;
            }
        }

        if (empty($groupPartials)) {
            throw new GroupNotFoundException(sprintf('No partials found for group: "%s"', $groupName));
        }

        return $groupPartials;
    }

    /**
     * @return array
     */
    public function loadPartialsByAll(): array
    {
        return $this->partials;
    }

    /**
     * @param array $partials
     * @return array
     */
    public function sortPartialsByPriority(array $partials): array
    {
        usort($partials, function ($item1, $item2) {
            return $item1['priority'] <=> $item2['priority'];
        });

        return $partials;
    }

    /**
     * @return RendererInterface
     */
    public function getViewRenderer(): RendererInterface
    {
        return $this->renderer;
    }

    /**
     * @param string|null $viewRenderer
     */
    public function setViewRenderer(string $viewRenderer = null)
    {
        if (is_null($viewRenderer)) {
            $viewRenderer = $this->renderer;
        }

        if (!$this->container->has($viewRenderer)) {
            throw new \RuntimeException(sprintf('ViewRenderer "%s" not found in the ServiceManager', $viewRenderer));
        }

        $this->renderer = $this->container->get($viewRenderer);
    }
}