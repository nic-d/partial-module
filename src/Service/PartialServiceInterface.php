<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 05/02/2019
 * Time: 11:11
 */

namespace Nybbl\PartialModule\Service;

use Psr\Container\ContainerInterface;
use Zend\View\Renderer\RendererInterface;
use Nybbl\PartialModule\Exception\GroupNotFoundException;
use Nybbl\PartialModule\Exception\PartialNotFoundException;

/**
 * Interface PartialServiceInterface
 * @package Nybbl\PartialModule\Service
 */
interface PartialServiceInterface
{
    /**
     * PartialServiceInterface constructor.
     * @param ContainerInterface $container
     * @param array $config
     */
    public function __construct(ContainerInterface $container, array $config = []);

    /**
     * @param string $partialName
     * @return array
     * @throws PartialNotFoundException
     */
    public function loadPartialByName(string $partialName): array;

    /**
     * @param int $start
     * @param int $end
     * @return array
     */
    public function loadPartialsWithinRange(int $start, int $end): array;

    /**
     * @param string $groupName
     * @return array
     * @throws GroupNotFoundException
     */
    public function loadPartialsByGroupName(string $groupName): array;

    /**
     * @return array
     */
    public function loadPartialsByAll(): array;

    /**
     * @param array $partials
     * @return array
     */
    public function sortPartialsByPriority(array $partials): array;

    /**
     * @return RendererInterface
     */
    public function getViewRenderer(): RendererInterface;

    /**
     * @param string|null $viewRenderer
     * @return void
     */
    public function setViewRenderer(string $viewRenderer = null);
}