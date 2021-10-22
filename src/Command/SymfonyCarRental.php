<?php

namespace App\Command;

use App\Corebase\Db as Database;
use Faker\Factory;

class SymfonyCarRental extends Database
{
    private const ENTRY = 6;
    private const DRIVERS_TABLE = 'drivers';

    public static function populateDrivers()
    {
        $database = parent::connection();
        $faker = Factory::create();
        $database->delete(self::DRIVERS_TABLE, []);

        for($i=0; $i<self::ENTRY; $i++):
            $database->insert(self::DRIVERS_TABLE, [
                'name'      => $faker->name(),
                'title'     => $faker->company() . ' driver',
                'avatar'    => 'driver-' . (int) ($i + 1) . '.jpg',
            ]);
            echo "Inseting ID:" . $database->id() . "\n";
        endfor;
    }
}