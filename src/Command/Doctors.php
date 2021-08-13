<?php

namespace App\Command;

use App\Corebase\Db as Database;
use Medoo\Medoo;

class Doctors extends Database
{
    public static function populatePatients()
    {
        $database = parent::connection();
        $database->insert('patients', [
            'name' => 'zyqqqqqx',
            'addr' => 'wwwww',
            'contact' => 'eeeee',
            'age' => 'rrrr',
            'sex' => 'tttt',
            'patient_id' => '67',
            'passwd' => '999',
            'code' => '89898998922200',
            'isAdmin' => 2,
        ]);
    }
}