<?php namespace Project\Service\String\Converter;

use src\Project\Service\String\Converter\Rot13;

class Rot13Test extends \Codeception\Test\Unit
{
    /**
     * @var Rot13
     */
    private $cr = null;

    /**
     * @var \Psr\Container\ContainerInterface
     */
    private $container = null;

    protected function _before()
    {
        include dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . "/bootstrap.php";

        $this->container = $container;
        $this->cr = $this->container->get('converter.rot13');
    }

    protected function _after()
    {
    }

    public function testConverterRot13WasInstantiated()
    {
        $this->assertInstanceOf(Rot13::class, $this->cr);
        $this->assertTrue(method_exists($this->cr, 'convert'));
    }

    public function testConverterRot13ParsesEmptyStringParameterCorrectly()
    {
        $this->assertEquals($this->cr->convert(""), "");
    }

    public function testConverterRot13WorksAsExpected()
    {
        $this->assertEquals($this->cr->convert("1PT0m"), "1CG0z");
    }
}