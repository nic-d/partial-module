<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 05/02/2019
 * Time: 11:19
 */

namespace Nybbl\PartialModule\Renderer;

use Nybbl\PartialModule\Service\PartialServiceInterface;
use Nybbl\PartialModule\Exception\GroupNotFoundException;
use Nybbl\PartialModule\Exception\PartialNotFoundException;

/**
 * Class PartialRenderer
 * @package Nybbl\PartialModule\Renderer
 */
class PartialRenderer implements PartialRendererInterface
{
    /** @var PartialServiceInterface $partialService */
    private $partialService;

    /**
     * PartialRenderer constructor.
     * @param PartialServiceInterface $partialService
     */
    public function __construct(PartialServiceInterface $partialService)
    {
        $this->partialService = $partialService;
    }

    /**
     * @param string $partialName
     * @param null|array|object $data
     * @return string
     * @throws PartialNotFoundException
     */
    public function render(string $partialName, $data = null): string
    {
        $loadedPartial = $this->partialService->loadPartialByName($partialName);
        return $this->partialService->getViewRenderer()->render($loadedPartial['path'], $data);
    }

    /**
     * @param array $partials
     * @param null|array|object $data
     * @return array
     */
    public function renderMultiple(array $partials, $data = null): array
    {
        $renderedPartials = [];

        foreach ($partials as $partial) {
            $renderedPartials[] = $this->render($partial, $data);
        }

        return $renderedPartials;
    }

    /**
     * @param int $start
     * @param int $end
     * @param null|array|object $data
     * @return array
     */
    public function renderRange(int $start, int $end, $data = null): array
    {
        $renderedPartials = [];
        $rangedPartials = $this->partialService->loadPartialsWithinRange($start, $end);

        foreach ($rangedPartials as $rangedPartial) {
            $renderedPartials[] = $this->render($rangedPartial['name'], $data);
        }

        return $renderedPartials;
    }

    /**
     * @param string $partialGroup
     * @param null|array|object $data
     * @return array
     * @throws GroupNotFoundException
     */
    public function renderGroup(string $partialGroup, $data = null): array
    {
        $renderedPartials = [];
        $groupPartials = $this->partialService->loadPartialsByGroupName($partialGroup);

        foreach ($groupPartials as $groupedPartial) {
            $renderedPartials[] = $this->render($groupedPartial['name'], $data);
        }

        return $renderedPartials;
    }
}