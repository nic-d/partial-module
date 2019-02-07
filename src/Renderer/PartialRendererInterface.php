<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 05/02/2019
 * Time: 11:19
 */

namespace Nybbl\PartialModule\Renderer;

use Nybbl\PartialModule\Service\PartialServiceInterface;
use Nybbl\PartialModule\Exception\PartialNotFoundException;

/**
 * Interface PartialRendererInterface
 * @package Nybbl\PartialModule\Renderer
 */
interface PartialRendererInterface
{
    /**
     * PartialRendererInterface constructor.
     * @param PartialServiceInterface $partialService
     */
    public function __construct(PartialServiceInterface $partialService);

    /**
     * @param string $partialName
     * @param null|array|object $data
     * @return string
     * @throws PartialNotFoundException
     */
    public function render(string $partialName, $data = null): string;

    /**
     * @param array $partials
     * @param null|array|object $data
     * @return array
     * @throws PartialNotFoundException
     */
    public function renderMultiple(array $partials, $data = null): array;

    /**
     * @param int $start
     * @param int $end
     * @param null|array|object $data
     * @return array
     * @throws PartialNotFoundException
     */
    public function renderRange(int $start, int $end, $data = null): array;

    /**
     * @param string $partialGroup
     * @param null|array|object $data
     * @return mixed
     * @throws PartialNotFoundException
     */
    public function renderGroup(string $partialGroup, $data = null): array;

    /**
     * @param null|array|object $data
     * @return array
     */
    public function renderAll($data = null): array;
}