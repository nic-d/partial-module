<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 05/02/2019
 * Time: 09:56
 */

namespace Nybbl\PartialModule\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Nybbl\PartialModule\Renderer\PartialRendererInterface;

/**
 * Class PartialViewHelper
 * @package Nybbl\PartialModule\View\Helper
 */
class PartialViewHelper extends AbstractHelper implements PartialViewHelperInterface
{
    /** @var PartialRendererInterface $partialRenderer */
    private $partialRenderer;

    /**
     * PartialViewHelper constructor.
     * @param PartialRendererInterface $partialRenderer
     */
    public function __construct(PartialRendererInterface $partialRenderer)
    {
        $this->partialRenderer = $partialRenderer;
    }

    /**
     * @param string $templateName
     * @param null|array|object $templateData
     * @return string
     */
    public function one(string $templateName, $templateData = null): string
    {
        return $this->partialRenderer->render($templateName, $templateData);
    }

    /**
     * @param array $templateNames
     * @param null|array|object $templateData
     * @return array
     */
    public function multiple(array $templateNames, $templateData = null): array
    {
        return $this->partialRenderer->renderMultiple($templateNames, $templateData);
    }

    /**
     * @param int $start
     * @param int $end
     * @param null|array|object $templateData
     * @return array
     */
    public function range(int $start, int $end, $templateData = null): array
    {
        return $this->partialRenderer->renderRange($start, $end, $templateData);
    }

    /**
     * @param string $templateGroupName
     * @param null|array|object $templateData
     * @return array
     */
    public function group(string $templateGroupName, $templateData = null): array
    {
        return $this->partialRenderer->renderGroup($templateGroupName, $templateData);
    }

    /**
     * @param null $templateData
     * @return array
     */
    public function all($templateData = null): array
    {
        return $this->partialRenderer->renderAll($templateData);
    }
}