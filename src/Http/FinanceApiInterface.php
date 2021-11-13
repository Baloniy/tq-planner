<?php
declare(strict_types=1);

namespace App\Http;

use Symfony\Component\HttpFoundation\JsonResponse;

interface FinanceApiInterface
{
    public function fetchStockProfile(string $symbol, string $region): JsonResponse;
}