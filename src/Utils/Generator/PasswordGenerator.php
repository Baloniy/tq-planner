<?php

declare(strict_types=1);

namespace App\Utils\Generator;

use Exception;
use function mb_strlen;
use function random_int;

class PasswordGenerator
{
    public const PASSWORD_LENGTH = 8;

    public static function generatePassword(int $length = self::PASSWORD_LENGTH): string
    {
        $characters = '0123456789abcdefghigklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWXYZ!-.[]?*()';

        $password = '';

        $characterListLength = mb_strlen($characters) - 1;

        for ($i = 1; $i <= $length; ++$i) {
            try {
                $password .= $characters[random_int(0, $characterListLength)];
            } catch (Exception $exception) {
            }
        }

        return $password;
    }
}
