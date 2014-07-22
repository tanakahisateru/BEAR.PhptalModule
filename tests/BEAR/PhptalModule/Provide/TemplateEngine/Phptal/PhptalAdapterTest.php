<?php

namespace BEAR\PhptalModule\Provide\TemplateEngine\Phptal;

use BEAR\PhptalModule\Provide\TemplateEngine\Phptal\PhptalAdapter;

class PhptalAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PhptalAdapter
     */
    private $phptalAdapter;

    /**
     * @var string
     */
    private $tpl;

    public function setUp()
    {
        $phptal = new \PHPTAL;
        $phptal->setPhpCodeDestination(dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . '/tmp');
        $this->phptalAdapter = new PhptalAdapter($phptal);
        $this->tpl = __DIR__ . '/test.';
    }

    public function testNew()
    {
        $this->assertInstanceOf('\BEAR\PhptalModule\Provide\TemplateEngine\Phptal\PhptalAdapter', $this->phptalAdapter);
    }

    public function testAssign()
    {
        $this->phptalAdapter->assign('greeting', 'adios');
        $result = $this->phptalAdapter->fetch($this->tpl);
        $this->assertSame('greeting is adios', $result);
    }

    public function testAssignAll()
    {
        $this->phptalAdapter->assignAll(['greeting' => 'adios']);
        $result = $this->phptalAdapter->fetch($this->tpl);
        $this->assertSame('greeting is adios', $result);
    }

    /**
     * @expectedException BEAR\PhptalModule\Provide\TemplateEngine\Exception\TemplateNotFound
     */
    public function testTemplateNotExists()
    {
        $this->phptalAdapter->assignAll(['greeting' => 'adios']);
        $this->phptalAdapter->fetch('INVALID');
    }

    public function testGetTemplate()
    {
        $this->phptalAdapter->assignAll(['greeting' => 'adios']);
        $this->phptalAdapter->fetch($this->tpl);
        $templateFile = $this->phptalAdapter->getTemplateFile();
        $this->assertSame(__DIR__ . '/test.xhtml', $templateFile);
    }

    public function estProd()
    {
        $this->phptalAdapter->setIsProd(true)->init();
        $this->phptalAdapter->assignAll(['greeting' => 'adios']);
        $this->phptalAdapter->fetch($this->tpl);
        $templateFile = $this->phptalAdapter->getTemplateFile();
        $this->assertSame(__DIR__ . '/test.xhtml', $templateFile);
    }
}
