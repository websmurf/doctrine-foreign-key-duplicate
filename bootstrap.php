<?php
// Include Composer Autoload (relative to project root).
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// the connection configuration
$dbParams = [
    'host'   => '192.168.100.11',
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'doctrine',
];

$config = Setup::createAnnotationMetadataConfiguration([ __DIR__.'/Entities'], true, null, null, false);
$entityManager = EntityManager::create($dbParams, $config);