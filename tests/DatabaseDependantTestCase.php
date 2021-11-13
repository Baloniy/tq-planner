<?php

namespace App\Tests;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DatabaseDependantTestCase extends KernelTestCase
{
    protected EntityManagerInterface $em;

    public function setUp(): void
    {
        $kernel = self::bootKernel();

        //DatabasePrimer::prime($kernel);

        $this->em = $kernel->getContainer()->get('doctrine')->getManager();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        $this->em->close();
    }
}