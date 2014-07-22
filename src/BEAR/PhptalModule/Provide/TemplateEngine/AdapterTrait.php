<?php
/**
 * This file is part of the BEAR.Package package
 *
 * @package BEAR.PhptalModule
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\PhptalModule\Provide\TemplateEngine;

use BEAR\PhptalModule\Provide\TemplateEngine\Exception\TemplateNotFound;

trait AdapterTrait
{
    /**
     * Template file
     *
     * @var string
     */
    private $template;

    /**
     * Return file exists
     *
     * @param string $template
     *
     * @throws TemplateNotFound
     */
    private function fileExists($template)
    {
        if (!file_exists($template)) {
            throw new TemplateNotFound($template);
        }
    }

    /**
     * Return template full path.
     *
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->template;
    }
}
