<?php

namespace src\Project\Service\String\Converter;

use src\Project\Service\String\Generator\RandomString;

/**
 * Class Index
 *
 * @package src\Project\Service\String\Converter
 *
 * @author Gt2019 <gt2019test@gmail.com>
 */
class Index implements ConverterInterface
{
    private $pool = [];

    public function __construct(RandomString $rs)
    {
        $this->pool = $rs->pool;
    }

    /**
     * {@inheritdoc}
     */
    public function convert(string $string): string
    {
        if (empty($string) || !is_string($string)) {
            return "";
        }

        $res = "";
        $prev_num = false;
        $string = str_split($string);

        foreach ($string as $s) {
            if (is_numeric($s)) {
                //we just copy&paste numeric values
                $res .= $s;
                $prev_num = true;
            } else {
                if ($prev_num) {
                    //add / in case we had numeric value before alpha
                    $res .= "/";
                    $prev_num = false;
                }
                $res .= array_search($s, $this->pool) . "/";
            }
        }

        if ($prev_num) {
            //if last symbol was numeric - add / at the end
            $res .= "/";
        }

        return substr($res, 0, -1);
    }
}