<?php

namespace src\Project\Service\String\Generator;

use Psr\Container\ContainerInterface;

/**
 * Class RandomString. Used for various random string generation
 *
 * @package src\Project\Service\String\Generator
 *
 * @author Gt2019 <gt2019test@gmail.com>
 */
class RandomString
{
    /**
     * @var array an array containing range of symbols which will be used for strings generation
     */
    public $pool = [];

    /**
     * @var int internal value, storing last index of pool array
     */
    private $pool_last_index = 0;

    /**
     * @var int length of generated string
     */
    private $strlen = 0;


    /**
     * RandomString constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        //[a-z][A-Z][0-9]
        $this->pool = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));

        //calculate this only once - no need to do this on every method call and especially in the loops
        $this->pool_last_index = count($this->pool) - 1;

        //load lenght of strings from configuration
        $this->strlen = $container->getParameter('generator.random.length');
    }


    /**
     * Generates an array of given size filled with random strings
     *
     * @param int $amount amount of strings to generate
     *
     * @return array
     */
    public function getMany(int $amount): array
    {
        $res = [];

        for ($i = 0; $i < $amount; $i++) {
            $res[] = $this->getSingle();
        }

        return $res;
    }


    /**
     * Generates single random alphanumeric string
     *
     * @return string
     */
    public function getSingle(): string
    {
        $string = "";

        for ($i = 0; $i < $this->strlen; $i++) {
            $string .= $this->pool[mt_rand(0, $this->pool_last_index)];
        }

        return $string;
    }
}