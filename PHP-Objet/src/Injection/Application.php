<?php

namespace Orsys\Injection;


use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

class Application implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    public function run() {
        $this->logger->debug('Application started');
    }
}