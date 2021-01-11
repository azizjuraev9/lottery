<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = './tmp';
$cache = null;
$useSimpleAnnotationReader = false;
$entityPath = dirname(__DIR__) . '/entities';


$config = Setup::createAnnotationMetadataConfiguration(
    [ $entityPath ],
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);

// database configuration parameters
$conn = [
    'driver' => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'lottery',
];

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);