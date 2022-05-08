<?php

declare(strict_types=1);

namespace App\Utils;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelInterface;
use function file_exists;
use function file_get_contents;
use function sprintf;
use function json_decode;

trait ParseTrait
{
    public function getContentFromFile(KernelInterface $kernel, string $filename): array
    {
        $projectDir = $kernel->getProjectDir();

        $fileUrl = $projectDir . DIRECTORY_SEPARATOR . 'assets/data' . DIRECTORY_SEPARATOR . $filename . '.json';

        if (!file_exists($fileUrl)) {
            throw new NotFoundHttpException(
                sprintf("File %s does not exist!\n", $filename)
            );
        }

        return json_decode(file_get_contents($fileUrl), true);
    }
}
