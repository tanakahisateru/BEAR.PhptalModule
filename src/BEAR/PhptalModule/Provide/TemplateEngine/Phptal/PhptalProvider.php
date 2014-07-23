<?php
/**
 * This file is part of the BEAR.Package package
 *
 * @package BEAR.PhptalModule
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\PhptalModule\Provide\TemplateEngine\Phptal;

use BEAR\Sunday\Inject\TmpDirInject;
use BEAR\Sunday\Inject\LibDirInject;
use Ray\Di\ProviderInterface as Provide;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;

/**
 * PHPTAL provider
 *
 */
class PhptalProvider implements Provide
{
    use TmpDirInject;
    use LibDirInject;

    /**
     * Return instance
     *
     * @return \PHPTAL
     */
    public function get()
    {
        static $phptal;

        if ($phptal) {
            return $phptal;
        }

        $tmpDir = $this->tmpDir . '/phptal/cache';
        if (!file_exists($tmpDir)) {
            mkdir($tmpDir, 0777, true);
        }

        $phptal = new \PHPTAL;
        $phptal->setOutputMode(\PHPTAL::HTML5);
        $phptal->setPhpCodeDestination($tmpDir);
        $phptal->setTemplateRepository($this->libDir . '/phptal/template');

        return $phptal;
    }
}
