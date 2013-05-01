<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tanakahisateru
 * Date: 2013/05/01
 * Time: 19:35
 * To change this template use File | Settings | File Templates.
 */

namespace BEAR\PhptalModule\Provide\TemplateEngine\Phptal;


class PhptalModuleTest extends \PHPUnit_Framework_TestCase
{
    public function testConfigure()
    {
        $module = new PhptalModule();
        $module->activate();
        $info = strval($module);
        $this->assertContains('PhptalAdapter', $info);
        $this->assertContains('PhptalProvider', $info);
    }
}