<?php namespace Acme;

use Acme\Command;
use Acme\DatabaseAdapter;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\Table;

class DeleteCommand extends Command
{
    public function configure()
    {
        $this->setName('delete')
            ->setDescription('Delete a Task By ID')
            ->addArgument('id', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');
        
        $this->database->query(
            'DELETE FROM tasks WHERE (id) = (:id)',
            compact('id')
        );

        $output->writeln('<info>Task Removed!</info>');

        $this->showTasks($output);
    }
}
