<?php

declare(strict_types=1);

namespace App\Tests;

use App\Entity\Stock;

class StockTest extends DatabaseDependantTestCase
{
    /** @test */
    public function aStockRecordCanBeCreatedInTheDatabase()
    {
        // Stock
        $stock = new Stock();
        $stock->setSymbol('AMNZ');
        $stock->setShortName('Amazon Inc');
        $stock->setCurrency('USD');
        $stock->setExchangeName('Nasdaq');
        $stock->setRegion('US');
        $price = 1000;
        $previousClose = 1100;
        $priceChange = $price - $previousClose;
        $stock->setPrice($price);
        $stock->setPreviousClose($previousClose);
        $stock->setPriceChange($priceChange);
        $this->em->persist($stock);
        $this->em->flush();

        $stockRepo = $this->em->getRepository(Stock::class);
        $stockRecord = $stockRepo->findOneBy(['symbol' => 'AMNZ']);

        // Make assertions
        $this->assertEquals('Amazon Inc', $stockRecord->getShortName());
        $this->assertEquals('USD', $stockRecord->getCurrency());
        $this->assertEquals('Nasdaq', $stockRecord->getExchangeName());
        $this->assertEquals('US', $stockRecord->getRegion());
        $this->assertEquals(1000, $stockRecord->getPrice());
        $this->assertEquals(1100, $stockRecord->getPreviousClose());
        $this->assertEquals(-100, $stockRecord->getPriceChange());
    }
}
