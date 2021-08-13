<?php

namespace App\Corebase;

use App\Command\Doctors;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Commands
{
    public static function init()
    {
        $app = new \Silly\Application();

        #############################
        ### List of commands here ###
        #############################

        $app->command('seed:patients', [Doctors::class, 'populatePatients']);

        #################################
        ### EOF List of commands here ###
        #################################

        $app->run();
    }
}