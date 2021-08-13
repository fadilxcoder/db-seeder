<?php

namespace App\Command;

use App\Corebase\Db as Database;
use Faker\Factory;

class Doctors extends Database
{
    private const ENTRY = 100;
    private const TABLE = 'patients';

    public static function populatePatients()
    {
        $database = parent::connection();
        $faker = Factory::create();

        $database->delete(self::TABLE, []);

        for($i=0; $i<self::ENTRY; $i++):
            $database->insert(self::TABLE, [
                'name'      => $faker->name(),
                'addr'      => $faker->city(),
                'contact'   => $faker->email(),
                'age'       => $faker->numberBetween(18, 80),
                'sex'       => $faker->randomElement(['Male', 'Female']),
                'patient_id'=>$faker->numerify('fx-####'),
            ]);
            echo "Inseting ID:" . $database->id() . "\n";
        endfor;
    }
}