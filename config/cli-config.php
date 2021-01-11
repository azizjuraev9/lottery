<?php
require 'vendor/autoload.php';


use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Configuration\ExistingConfiguration;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Tools\Console\Command;

// replace with file to your own project bootstrap
require_once __DIR__ . '/doctrine.php';


$config = new PhpFile(__DIR__ . '/migrations.php');

$helperSet = ConsoleRunner::createHelperSet($entityManager);

$connection = DriverManager::getConnection($conn);

$dependencyFactory = DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));

$cli = ConsoleRunner::createApplication($helperSet,[
    new Command\DumpSchemaCommand($dependencyFactory),
    new Command\DiffCommand($dependencyFactory),
    new Command\ExecuteCommand($dependencyFactory),
    new Command\GenerateCommand($dependencyFactory),
    new Command\LatestCommand($dependencyFactory),
    new Command\ListCommand($dependencyFactory),
    new Command\MigrateCommand($dependencyFactory),
    new Command\RollupCommand($dependencyFactory),
    new Command\StatusCommand($dependencyFactory),
    new Command\SyncMetadataCommand($dependencyFactory),
    new Command\VersionCommand($dependencyFactory),
]);

return $cli->run();