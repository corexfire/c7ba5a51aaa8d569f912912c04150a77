<?php


namespace App\Console;

require "inc.php";

use App\Migrate\Mail;
use App\Migrate\Token;
use App\Migrate\User;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Migrate extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('migrate');
        $this->setDescription('run migrate');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Start Migration',
        ]);

        $user = new User();
        $this->dropAndMigrate($user);

        $token = new Token();
        $this->dropAndMigrate($token);

        $mail = new Mail();
        $this->dropAndMigrate($mail);

        $output->writeln('migration success');
        return 0;
    }

    protected function dropAndMigrate($migrateFile) {
        $migrateFile->drop();
        $migrateFile->migrate();
    }
}