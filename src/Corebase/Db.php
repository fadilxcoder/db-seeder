<?php

namespace App\Corebase;

use Medoo\Medoo;

class Db
{
    public static function connection()
    {
        return new Medoo([
            'type'      => $_ENV['DB_TYPE'],
            'host'      => $_ENV['DB_HOST'],
            'database'  => $_ENV['DB_NAME'],
            'username'  => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD']
        ]);
    }
}
