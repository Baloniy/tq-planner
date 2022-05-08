<?php

declare(strict_types=1);

namespace App\Tests\Integration\Security;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @group integration
 */
class EmailVerifierTests extends KernelTestCase
{

    private UserRepository $userRepository;

    public function setUp(): void
    {
        parent::setUp();

        self::bootKernel();

        $this->userRepository = self::getContainer()->get(UserRepository::class);
    }

    public function testVerifyEmail(): void
    {
        dd($this->userRepository->findOneBy([]));
    }
}
