<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpKernel\KernelInterface;

#[AsCommand(
    name: 'app:parse-skills',
    description: 'Parse skills from json format',
)]
class ParseSkillsCommand extends Command
{

    public function __construct(
        private KernelInterface $kernel,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('filename', InputArgument::REQUIRED, 'json file');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $io = new SymfonyStyle($input, $output);
        $filename = $input->getArgument('filename');
        if ($filename) {
            $io->note(sprintf('You passed an argument: %s', $filename));
        }

        $message = "";

        return Command::SUCCESS;
    }
}
