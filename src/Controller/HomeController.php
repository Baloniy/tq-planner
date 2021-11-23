<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\MasteryRepository;
use App\Service\ParseSkillsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function index(MasteryRepository $masteryRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'masteries' => [],
        ]);
    }

    #[Route(path: '/parsing', name: 'parsing')]
    public function parseAction(ParseSkillsService $parseSkillsService)
    {
        $parseSkillsService->parse('dream-test.json');

        return $this->render('home/index.html.twig', [
            'masteries' => [],
        ]);
    }
}
