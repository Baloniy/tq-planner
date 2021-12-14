<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\MasteryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function index(MasteryRepository $masteryRepository): Response
    {
        $masters = $masteryRepository->findAll();

        return $this->render('main/home/index.html.twig', [
            'masters' => $masters,
        ]);
    }
}
