<?php namespace Project\Service\String\Converter;

use src\Project\Service\String\Converter\Index;

class IndexTest extends \Codeception\Test\Unit
{
    /**
     * @var Index
     */
    private $ci = null;

    /**
     * @var \Psr\Container\ContainerInterface
     */
    private $container = null;

    protected function _before()
    {
        include dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . "/bootstrap.php";

        $this->container = $container;
        $this->ci = $this->container->get('converter.index');
    }

    protected function _after()
    {
    }

    public function testConverterIndexWasInstantiated()
    {
        $this->assertInstanceOf(Index::class, $this->ci);
        $this->assertTrue(method_exists($this->ci, 'convert'));
    }

    public function testConverterIndexParsesEmptyStringParameterCorrectly()
    {
        $this->assertEquals($this->ci->convert(""), "");
    }

    public function testConverterIndexWorksAsExpected()
    {
        $this->assertEquals($this->ci->convert("22A67"), "22/26/67");
    }
}