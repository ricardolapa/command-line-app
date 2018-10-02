<?php namespace Acme;

use Acme\Command;
use Acme\DatabaseAdapter;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\Table;

class ShowCommand extends Command
{
    public function configure()
    {
        $this->setName('show')
            ->setDescription('Show All Tasks.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
       $this->showTasks($output); // moved to ParentClass to be available on "add" and "delete" commands
    }
}
