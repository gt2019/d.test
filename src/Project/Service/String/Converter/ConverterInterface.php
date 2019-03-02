<?php

namespace src\Project\Service\String\Converter;


interface ConverterInterface
{
    /**
     * Converts input string by algorithm predefined in a specific converter
     *
     * @param string $string input string
     *
     * @return string converted string
     */
    public function convert(string $string): string;
}