<?php

declare(strict_types=1);

namespace App\Command;

use Throwable;
use App\Service\Parsing\EquipmentService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:parse-equipment',
    description: 'Parse equipment from json format',
)]
class ParseEquipmentCommand extends Command
{
    public function __construct(
        private readonly EquipmentService $service
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $message = "Equipment parsed successfully\n";

        $status = Command::SUCCESS;

        try {
            $this->service->parse();
        } catch (Throwable $exception) {
            $message = $exception;
            $status = Command::FAILURE;
        }

        $output->write($message);

        return $status;
    }
}
