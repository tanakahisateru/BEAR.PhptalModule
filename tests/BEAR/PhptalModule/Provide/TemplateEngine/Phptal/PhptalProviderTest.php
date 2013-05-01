<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tanakahisateru
 * Date: 2013/05/01
 * Time: 20:08
 * To change this template use File | Settings | File Templates.
 */

namespace BEAR\PhptalModule\Provide\TemplateEngine\Phptal;


class PhptalProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $provider = new PhptalProvider();
        $provider->setAppDir(__DIR__ . '/app');
        $provider->setTmpDir(__DIR__ . '/tmp');
        /** @var $instance \PHPTAL */
        $instance = $provider->get();
        $this->assertInstanceOf('\PHPTAL', $instance);
        foreach ($instance->getTemplateRepositories() as $repos) {
            $this->assertStringStartsWith(__DIR__ . '/app', $repos);
        }
        $this->assertStringStartsWith(__DIR__ . '/tmp', $instance->getPhpCodeDestination());
    }
}