<?php
require_once 'vendor/autoload.php';
require_once 'config/servicemanager.php';

$application = $serviceManager->get('app');
$application->run();