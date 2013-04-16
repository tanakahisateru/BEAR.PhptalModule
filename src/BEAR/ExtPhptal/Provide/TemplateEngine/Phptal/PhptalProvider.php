<?php
/**
 * This file is part of the BEAR.Package package
 *
 * @package BEAR.ExtPhptal
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\ExtPhptal\Provide\TemplateEngine\Phptal;

use BEAR\Sunday\Inject\AppDirInject;
use BEAR\Sunday\Inject\TmpDirInject;
use Ray\Di\ProviderInterface as Provide;

/**
 * PHPTAL provider
 *
 * @package    BEAR.ExtPhptal
 * @subpackage Module
 */
class PhptalProvider implements Provide
{
    use TmpDirInject;
    use AppDirInject;

    /**
     * Return instance
     *
     * @return \PHPTAL
     */
    public function get()
    {
        $phptal = new \PHPTAL();
        $phptal->setOutputMode(\PHPTAL::HTML5);
        $phptal->setPhpCodeDestination($this->tmpDir . '/cache');
        $phptal->setTemplateRepository($this->appDir . '/Resource/Page');
        $phptal->setTemplateRepository($this->appDir . '/Resource/View');
        return $phptal;
    }
}
