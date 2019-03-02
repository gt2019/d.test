<?php
require dirname(__DIR__) . "/bootstrap.php";

/** @var $rs \src\Project\Service\String\Generator\RandomString */
$rs = $container->get('rstring');

$single_string = $rs->getSingle();

echo "<h3>1. Generators</h3>";

echo "<h4>a) Rand srtingas</h4>";
echo $single_string;
echo "<br/><br/>";

echo "<h4>b) Masyvas is rand srtingu</h4>";
pa($rs->getmany(3));
echo "<br/><br/>";

/** @var $ci \src\Project\Service\String\Converter\Index */
$ci = $container->get('converter.index');

echo "<h3>2. Converters</h3>";
echo "<h4>a) Keiciame eilute i skaicius atskirtus '/'</h4>";
echo $ci->convert($single_string);



function pa($arr): void
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}