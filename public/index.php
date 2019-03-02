<?php
require dirname(__DIR__) . "/bootstrap.php";

/** @var $gr \src\Project\Service\String\Generator\RandomString */
$gr = $container->get('generator.random');

/** @var $ci \src\Project\Service\String\Converter\Index */
$ci = $container->get('converter.index');

/** @var $cr \src\Project\Service\String\Converter\Rot13 */
$cr = $container->get('converter.rot13');


$single_string = $gr->getSingle();


echo "<h3>1. Generators</h3>";

echo "<h4>a) Rand srtingas</h4>";
echo $single_string;
echo "<br/><br/>";

echo "<h4>b) Masyvas is rand srtingu</h4>";
echo "<pre>";
print_r($gr->getmany(3));
echo "</pre>";
echo "<br/><br/>";


echo "<h3>2. Converters</h3>";
echo "<h4>a) Keiciame eilute i skaicius atskirtus '/'</h4>";
echo "{$single_string} ==> " . $ci->convert($single_string);
echo "<br/><br/>";

echo "<h4>a) rot13</h4>";
echo "{$single_string} ==> " . $cr->convert($single_string);
echo "<br/><br/>";


echo "<h3>3. Mapinam generatorius su converteriais</h3>";
$gnc_mapping = [
    'getSingle' => [
        'converter' => $cr,
        'params' => [],
    ],
    'getMany' => [
        'converter' => $ci,
        'params' => [2]
    ]
];

for ($i = 0; $i < 3; $i++) {
    $fnc = array_rand($gnc_mapping);

    $res = call_user_func_array([$gr, $fnc], $gnc_mapping[$fnc]['params']);

    if (is_array($res)) {
        foreach ($res as $v) {
            echo "{$v} ==> " . $gnc_mapping[$fnc]['converter']->convert($v) . "<br/>";
        }
    } else {
        echo "{$res} ==> " . $gnc_mapping[$fnc]['converter']->convert($res) . "<br/>";
    }
    echo "<br/>";
}