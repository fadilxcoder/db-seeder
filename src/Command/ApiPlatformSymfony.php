<?php

namespace App\Command;

use App\Corebase\Db as Database;
use Faker\Factory;

class ApiPlatformSymfony extends Database
{
    private const ENTRY = 100;
    private const TABLE = 'cheese_listing';

    public static function populateCheese()
    {
        $database = parent::connection();
        $faker = Factory::create();
        $database->delete(self::TABLE, []);

        for($i=0; $i<self::ENTRY; $i++):
            $database->insert(self::TABLE, [
                'title'         => $faker->name(),
                'description'   => $faker->paragraph(5),
                'price'         => $faker->numberBetween(99, 9999),
                'created_at'    => $faker->dateTime($max = 'now', $timezone = null)->format('Y-m-d H:i:s'),
                'is_published'  => $faker->randomElement([0, 1]),
            ]);
            echo "Inseting ID:" . $database->id() . "\n";
        endfor;
    }
}