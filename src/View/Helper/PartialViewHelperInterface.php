<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 05/02/2019
 * Time: 12:22
 */

namespace Nybbl\PartialModule\View\Helper;

/**
 * Interface PartialViewHelperInterface
 * @package Nybbl\PartialModule\View\Helper
 */
interface PartialViewHelperInterface
{
    /**
     * @param string $templateName
     * @param null|array|object $templateData
     * @return string
     */
    public function one(string $templateName, $templateData = null): string;

    /**
     * @param array $templateNames
     * @param null|array|object $templateData
     * @return array
     */
    public function multiple(array $templateNames, $templateData = null): array;

    /**
     * @param int $start
     * @param int $end
     * @param null|array|object $templateData
     * @return array
     */
    public function range(int $start, int $end, $templateData = null): array;

    /**
     * @param string $templateGroupName
     * @param null|array|object $templateData
     * @return array
     */
    public function group(string $templateGroupName, $templateData = null): array;

    /**
     * @param null|array|object $templateData
     * @return array
     */
    public function all($templateData = null): array;
}