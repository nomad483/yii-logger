<?php

namespace app\common\loggers;

use app\common\interfaces\LoggerServiceInterface;

class LoggerFactory
{
    public static function createLogger($type): LoggerServiceInterface
    {
        switch ($type) {
            case 'email':
                return new EmailLogger();
            case 'database':
                return new DatabaseLogger();
            case 'file':
                return new FileLogger();
            default:
                throw new \InvalidArgumentException('Invalid logger type');
        }
    }
}
