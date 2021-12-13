<?php

declare(strict_types=1);

namespace App\Http;

use Symfony\Component\HttpFoundation\JsonResponse;

class FakeYahooFinanceApiClient implements FinanceApiInterface
{
    public static int $statusCode = 200;
    public static string $content = '';

    public function fetchStockProfile(string $symbol, string $region): JsonResponse
    {
        return new JsonResponse(self::$content, self::$statusCode, [], $json = true);
    }
}
