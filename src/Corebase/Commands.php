<?php

namespace App\Corebase;

use App\Command\Doctors;
use App\Command\ApiPlatformSymfony;
use App\Command\CacheStartUp;
use App\Command\SymfonyCarRental;

class Commands
{
    public static function init()
    {
        $app = new \Silly\Application();

        #############################
        ### List of commands here ###
        #############################

        # Database

        $app->command('seed:db:patients', [Doctors::class, 'populatePatients']);
        $app->command('seed:db:cheese-listing', [ApiPlatformSymfony::class, 'populateCheese']);
        $app->command('seed:db:users', [ApiPlatformSymfony::class, 'populateUser']);
        $app->command('seed:db:drivers', [SymfonyCarRental::class, 'populateDrivers']);

        # Cache

        $app->command('seed:cache:company', [CacheStartUp::class, 'populateStartUp']);

        #################################
        ### EOF List of commands here ###
        #################################

        $app->run();
    }
}