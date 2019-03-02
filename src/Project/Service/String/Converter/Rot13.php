<?php

namespace src\Project\Service\String\Converter;

/**
 * Class Rot13
 *
 * @package src\Project\Service\String\Converter
 *
 * @author Gt2019 <gt2019test@gmail.com>
 */
class Rot13 implements ConverterInterface
{
    /**
     * {@inheritdoc}
     */
    public function convert(string $string): string
    {
        return str_rot13($string);
    }
}