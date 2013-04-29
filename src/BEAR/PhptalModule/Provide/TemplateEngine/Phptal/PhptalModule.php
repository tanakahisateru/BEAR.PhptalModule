<?php
/**
 * This file is part of the BEAR.Package package
 *
 * @package BEAR.PhptalModule
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\PhptalModule\Provide\TemplateEngine\Phptal;

use Ray\Di\AbstractModule;
use Ray\Di\Scope;

/**
 * PHPTAL module
 *
 */
class PhptalModule extends AbstractModule
{

    protected function configure()
    {
        $this
            ->bind('BEAR\Sunday\Extension\TemplateEngine\TemplateEngineAdapterInterface')
            ->to(__NAMESPACE__ . '\PhptalAdapter')
            ->in(Scope::SINGLETON);
        $this
            ->bind('PHPTAL')
            ->toProvider(__NAMESPACE__ . '\PhptalProvider')
            ->in(Scope::SINGLETON);
    }
}
