<?php

namespace Orsys\Injection;


use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class FileLogger implements LoggerInterface
{
    use LoggerTrait;

    /** @var resource */
    protected $fileRes;

    public function __construct()
    {
        $this->fileRes = fopen('logs/app.log', 'a');
    }

    public function __destruct()
    {
        fclose($this->fileRes);
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        fwrite($this->fileRes, "$message\n");
    }
}