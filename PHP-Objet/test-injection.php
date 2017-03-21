<?php

require_once 'vendor/autoload.php';

$application = new \Orsys\Injection\Application();
$logger = new \Orsys\Injection\FileLogger();
$application->setLogger($logger);

$application->run();