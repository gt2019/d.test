<?php

namespace src\Project\Service\String\Generator;

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
    private $strlen = 5;


    public function __construct()
    {
        //[a-z][A-Z][0-9]
        $this->pool = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));

        //calculate this only once - no need to do this on every method call and especially in the loops
        $this->pool_last_index = count($this->pool) - 1;
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