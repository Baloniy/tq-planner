<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\Parsing\EquipmentService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

#[AsCommand(
    name: 'app:parse-equipment-sets',
    description: 'Parse equipment sets from json format',
)]
class ParseEquipmentSetsCommand extends Command
{
    public function __construct(
        private readonly EquipmentService $service
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $message = "Sets parsed successfully\n";
        $status = Command::SUCCESS;

        try {
            $this->service->parseSets();
        } catch (Throwable $exception) {
            $message = $exception->getMessage();
            $status = Command::FAILURE;
        }

        $output->write($message);

        return $status;
    }
}
