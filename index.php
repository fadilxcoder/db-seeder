<?php

if (file_exists(__DIR__ . '/vendor/autoload.php')) :
    require __DIR__ . '/vendor/autoload.php';
else :
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Did you install the dependencies ? ☺';
    exit(1);
endif;

use Dotenv\Dotenv;
use App\Corebase\Db as Database;
use App\Corebase\Commands;

if(defined('STDIN')):
    Dotenv::createImmutable(__DIR__ . '/')->load();
    Commands::init();
else:
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo '<pre>Use CLI, operation prohibited !</pre>';
    exit(1);
endif;