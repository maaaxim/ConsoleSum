<?php

namespace Maaaxim;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Helper\ProgressIndicator;

/**
 * Class SumCommand
 * @package Maaaxim
 */
class SumCommand extends Command
{
    /**
     * Wait 10 second to count sum
     */
    const SECONDS = 10;

    public function configure()
    {
        $this->setName('sum')
            ->setDescription("This console run command")
            ->addArgument('a', InputArgument::REQUIRED . 'First number')
            ->addArgument('b', InputArgument::REQUIRED . 'Second number');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sum = $input->getArgument('a') + $input->getArgument('b');
        $progress = new ProgressIndicator($output);
        $progress->start('Starting...');
        $progress->advance();
        sleep(1);
        for($i = 0; $i <= self::SECONDS; $i++){
            $progress->advance();
            $progress->setMessage("Very hard calculations... {$i}");
            sleep(1);
        }
        $progress->finish("Finally. The sum is {$sum}!");
    }
}