<?php
require dirname(__DIR__) . "/bootstrap.php";

$rs = $container->get('rstring');

echo $rs->getSingle();