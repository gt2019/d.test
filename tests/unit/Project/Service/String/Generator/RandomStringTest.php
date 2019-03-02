<?php
class RandomStringTest extends \Codeception\Test\Unit
{
    /**
     * @var \src\Project\Service\String\Generator\RandomString
     */
    private $gr = null;

    /**
     * @var \Psr\Container\ContainerInterface
     */
    private $container = null;

    protected function _before()
    {
        include dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . "/bootstrap.php";

        $this->container = $container;
        $this->gr = $this->container->get('generator.random');
    }

    protected function _after()
    {
    }

    public function testGeneratorWasInstantiated()
    {
        $this->assertInstanceOf(\src\Project\Service\String\Generator\RandomString::class, $this->gr);
        $this->assertObjectHasAttribute('pool', $this->gr);
    }

    public function testGetSingleStringReturnsAString()
    {
        $s = $this->gr->getSingle();

        if (empty($s)) {
            $this->fail("An empty string was returned");
        }

        if (!is_string($s)) {
            $this->fail("Expected result of type 'string' while method returned '" . gettype($s) . "'");
        }
    }

    public function testGetSingleReturnsAValidLengthString()
    {
        $s = $this->gr->getSingle();

        $this->assertEquals($this->container->getParameter('generator.random.length'), strlen($s));
    }

    public function testGetManyReturnsAnArray()
    {
        $s = $this->gr->getMany(2);

        if (!is_array($s)) {
            $this->fail("Expected result of type 'array' while method returned '" . gettype($s) . "'");
        }
    }

    public function testGetManyReturnsValidAmountOfElements()
    {
        $amount = 7;
        $s = $this->gr->getMany($amount);

        $this->assertEquals($amount, count($s));
    }

    public function testGetManyElementsAreStrings()
    {
        $s = $this->gr->getMany(1);

        $this->assertEquals(gettype($s[0]), 'string');
    }

    public function testGetManyElementsHasValidLength()
    {
        $s = $this->gr->getMany(1);

        $this->assertEquals(strlen($s[0]), $this->container->getParameter('generator.random.length'));
    }
}