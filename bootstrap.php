<?php

require_once('vendor/autoload.php');

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

//initializing DI container
$container = new ContainerBuilder();

//loading DI onfig
$loader = new YamlFileLoader($container, new FileLocator(dirname(__FILE__) . "/config/"));
$loader->load('services.yaml');

//compiling DI container
$container->compile();