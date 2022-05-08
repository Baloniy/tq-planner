<?php

declare(strict_types=1);

namespace App\Tests\Unit\Utils\Generator;

use App\Utils\Generator\PasswordGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class PasswordGeneratorTest extends TestCase
{
    public function testGeneratePassword(): void
    {
        $password = PasswordGenerator::generatePassword();

        self::assertSame(PasswordGenerator::PASSWORD_LENGTH, mb_strlen($password));
    }
}
