<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Repository\MasteryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MasteryController extends AbstractController
{
    #[Route('/v1/mastery/{slug}', name: 'app_mastery')]
    public function show(string $slug, MasteryRepository $masteryRepository): JsonResponse
    {
        $mastery = $masteryRepository->findOneBy(['slug' => $slug]);

        return $this->json(['mastery' => $mastery]);
    }
}
