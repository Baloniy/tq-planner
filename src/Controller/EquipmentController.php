<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\EquipmentRepository;
use App\Repository\EquipmentTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipmentController extends AbstractController
{
    #[Route('/equipments', name: 'equipments')]
    public function index(Request $request, EquipmentRepository $equipmentRepository, EquipmentTypeRepository $equipmentTypeRepository): Response
    {
        $equipments = $equipmentRepository->findAllEquipmentOrderedByNewest($request->query->all());

        return $this->render('main/equipment/index.html.twig', [
            'equipments' => $equipments,
            'equipmentTypes' => $equipmentTypeRepository->findAll(),
        ]);
    }
}
