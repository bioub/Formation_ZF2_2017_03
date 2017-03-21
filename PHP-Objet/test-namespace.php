<?php

use Orsys\Model\Contact;

require_once 'vendor/autoload.php';

// FQN ou FQCN
// Fully Qualified Class Name
// \Orsys\Model\Contact

$logger = new \Orsys\Log\FileLoggerAvecInterface();
$logger->log('debug', 'Mon message de log');
$logger->debug('Mon message de log');

$romain = new Contact();
$orsys = new \Orsys\Model\Societe();
$orsys->setNom('Orsys');
$romain->setSociete($orsys);

echo 'Société : ' . $romain->getSociete()->getNom();