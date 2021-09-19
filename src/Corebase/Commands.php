<?php

namespace App\Corebase;

use App\Command\Doctors;
use App\Command\ApiPlatformSymfony;

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

        #################################
        ### EOF List of commands here ###
        #################################

        $app->run();
    }
}