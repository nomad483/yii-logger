<?php

namespace app\controllers;

use app\common\loggers\Logger;

class LoggerController
{
    public function actionLog()
    {
        $logger = new Logger();

        $logger->send('logged data');
    }

    public function actionLogTo(string $type)
    {
        $logger = new Logger();

        $logger->sendByLogger('logged data', $type);
    }

    public function actionLogToAll()
    {
        $logger = new Logger();

        $logger->sendByLogger('logged data', 'email');
        $logger->sendByLogger('logged data', 'database');
        $logger->sendByLogger('logged data', 'file');
    }
}
