<?php

namespace App\Command;

use App\Corebase\Db as Database;
use Faker\Factory;

class ApiPlatformSymfony extends Database
{
    private const ENTRY = 25;
    private const CL_TABLE = 'cheese_listing';
    private const USR_TABLE = 'user';

    public static function populateCheese()
    {
        $database = parent::connection();
        $faker = Factory::create();
        $database->delete(self::CL_TABLE, []);

        for($i=0; $i<self::ENTRY; $i++):
            $database->insert(self::CL_TABLE, [
                'title'         => $faker->name(),
                'description'   => $faker->paragraph(5),
                'price'         => $faker->numberBetween(99, 9999),
                'created_at'    => $faker->dateTime($max = 'now', $timezone = null)->format('Y-m-d H:i:s'),
                'is_published'  => $faker->randomElement([0, 1]),
                'owner_id'      => $faker->numberBetween(0, self::ENTRY),
            ]);
            echo "Inseting ID:" . $database->id() . "\n";
        endfor;
    }

    public static function populateUser()
    {
        $database = parent::connection();
        $faker = Factory::create();
        $database->delete(self::USR_TABLE, []);

        for($i=0; $i<self::ENTRY; $i++):
            $database->insert(self::USR_TABLE, [
                'email' => $faker->email(),
                'roles' => json_encode([]),
                'password' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            ]);
            echo "Inseting ID:" . $database->id() . "\n";
        endfor;
    }
}