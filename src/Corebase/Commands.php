<?php

namespace App\Corebase;

use App\Command\Doctors;
use App\Command\ApiPlatformSymfony;
use App\Command\SymfonyCarRental;

class Commands
{
    public static function init()
    {
        $app = new \Silly\Application();

        #############################
        ### List of commands here ###
        #############################

        $app->command('seed:patients', [Doctors::class, 'populatePatients']);
        $app->command('seed:cheese-listing', [ApiPlatformSymfony::class, 'populateCheese']);
        $app->command('seed:users', [ApiPlatformSymfony::class, 'populateUser']);
        $app->command('seed:drivers', [SymfonyCarRental::class, 'populateDrivers']);

        #################################
        ### EOF List of commands here ###
        #################################

        $app->run();
    }
}