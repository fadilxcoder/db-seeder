<?php

namespace App\Command;

use App\Corebase\Redis;
use Faker\Factory;
use App\ValueObject\Company;

class CacheStartUp
{
    private const ENTRY = 25;

    public static function populateStartUp()
    {
        $faker = Factory::create();
        $company = [];

        for ($i = 0; $i < self::ENTRY; ++$i) {
            $newCompany = new Company(
                $faker->company(),
                $faker->catchPhrase(),
                $faker->bs(),
                $faker->phoneNumber()
            );

            # $company[$i] = $newCompany->jsonSerialize(); - Data viewed in redis-commander is of Type: String (Binary) which is unreadable
            $company[$i] = $newCompany;
        }

        # Using serialize
        Redis::set(['db', 'seeder', 'cache', 'obj'], $company, false, true);

        # Using json_encode
        Redis::set(['db', 'seeder', 'cache', 'json'], $company);

        echo "\n### JSON DECODE \n\n";

        foreach(Redis::get([
            'db',
            'seeder',
            'cache',
            'json'
        ]) as $data):

            echo " - " . $data->name . "\n";
        endforeach;

        echo "\n### DESERIALIZE \n\n";

        foreach(Redis::get([
            'db',
            'seeder',
            'cache',
            'obj'
        ], true) as $data):
            # echo " - " . $data->name . "\n" when using `$company[$i] = $newCompany->jsonSerialize();`
            echo " - " . $data->getName() . "\n";
        endforeach;

        echo "\n\n Psst... ¯\_(ツ)_/¯ \n\n";
    }
}
