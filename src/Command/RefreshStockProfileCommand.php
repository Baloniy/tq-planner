<?php
declare(strict_types=1);

namespace App\Command;

use App\Http\FinanceApiInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Stock;

#[AsCommand(
    name: 'app:refresh-stock-profile',
    description: 'Retrieve a stock profile from the Yahoo Finance API. Update the record in the DB',
)]
class RefreshStockProfileCommand extends Command
{
    private EntityManagerInterface $em;
    private FinanceApiInterface $financeApi;
    private SerializerInterface $serializer;

    public function __construct(EntityManagerInterface $em, FinanceApiInterface $financeApi, SerializerInterface $serializer)
    {
        $this->em = $em;
        $this->financeApi = $financeApi;
        $this->serializer = $serializer;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('symbol', InputArgument::REQUIRED, 'Stock symbol e.g. AMZN for Amazon')
            ->addArgument('region', InputArgument::REQUIRED, 'The region of the company e.g. US for United States');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $stockProfile = $this->financeApi->fetchStockProfile($input->getArgument('symbol'), $input->getArgument('region'));

        if ($stockProfile->getStatusCode() !== 200) {

            // Handle non 200 status code responses
        }

        $stock = $this->serializer->deserialize($stockProfile, Stock::class, 'json');

        $this->em->persist($stock);

        $this->em->flush();

        return Command::SUCCESS;
    }
}
