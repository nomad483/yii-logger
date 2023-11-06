<?php

namespace app\common\loggers;

use app\common\interfaces\LoggerInterface;
use Yii;
use yii\base\InvalidConfigException;

class Logger implements LoggerInterface
{
    private string $loggerType;
    private LoggerFactory $factory;

    /**
     * @throws InvalidConfigException
     */
    public function __construct()
    {
        $loggerConfig = Yii::$app->get('loggerConfig');

        $this->loggerType = $loggerConfig->get('defaultLogger');
        $this->factory = $loggerConfig->get('loggerFactory');
    }

    /**
     * @inheritDoc
     */
    public function send(string $message): void
    {
        $logger = $this->factory::createLogger($this->loggerType);
        $logger->log($message);
    }

    /**
     * @inheritDoc
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        $logger = $this->factory::createLogger($loggerType);
        $logger->log($message);
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return $this->loggerType;
    }

    /**
     * @inheritDoc
     */
    public function setType(string $type): void
    {
        $this->loggerType = $type;
    }
}
