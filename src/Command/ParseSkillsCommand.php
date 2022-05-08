<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\Parsing\SkillsService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:parse-skills',
    description: 'Parse skills from json format',
)]
class ParseSkillsCommand extends Command
{
    public function __construct(
        private readonly SkillsService $parseSkillsService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('filename', InputArgument::REQUIRED, 'json file name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $filename = $input->getArgument('filename');
        if ($filename) {
            $io->note(sprintf('You passed an argument: %s', $filename));
        }

        $message = "Skills parsed successfully!\n";

        try {
            $this->parseSkillsService->parse($filename);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        $output->write($message);

        return Command::SUCCESS;
    }
}
