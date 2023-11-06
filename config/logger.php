<?php

$logger = [
    'loggerFactory' => 'app\common\loggers\LoggerFactory',
    'defaultLogger' => 'email',
    'email' => ['email' => 'your@email.com'],
    'database' => ['db' => 'your_db_connection'],
    'file' => ['file' => 'path_to_log_file'],
];

return $logger;
