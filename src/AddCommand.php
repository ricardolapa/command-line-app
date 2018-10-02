<?php namespace Acme;

use Acme\Command;
use Acme\DatabaseAdapter;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\Table;

class AddCommand extends Command
{
    public function configure()
    {
        $this->setName('add')
            ->setDescription('Add a Task and Show All Tasks.')
            ->addArgument('description', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $description = $input->getArgument('description');
        
        $this->database->query(
            'INSERT INTO tasks (description) VALUES(:description)',
            compact('description')
        );

        $output->writeln('<info>Task Added!</info>');

        $this->showTasks($output);
    }
}
