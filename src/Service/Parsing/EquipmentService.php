<?php

declare(strict_types=1);

namespace App\Service\Parsing;

use App\Entity\Equipment;
use App\Entity\EquipmentSet;
use App\Entity\EquipmentType;
use App\Utils\ParseTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class EquipmentService
{
    use ParseTrait;

    public function __construct(
        private readonly KernelInterface $kernel,
        private readonly EntityManagerInterface $em
    ) {
    }

    public function parse(): void
    {
        $content = $this->getContentFromFile($this->kernel, 'equipment');

        foreach ($content as $key => $items) {
            $equipmentType = $this->em->getRepository(EquipmentType::class)->findOneBy(['tag' => $key]);

            if (!$equipmentType) {
                throw new \Exception('Equipment type does not exist');
            }

            foreach ($items as $equipmentItem) {
                $equipment = new Equipment(
                    equipmentType: $equipmentType,
                    itemLevel: $equipmentItem['itemLevel'] ?? 0,
                    name: $equipmentItem['name'],
                    tag: $equipmentItem['tag'],
                    properties: $equipmentItem['properties'] ?? [],
                );

                if (isset($equipmentItem['levelRequirement'])) {
                    $equipment->setLevelRequirement($equipmentItem['levelRequirement']);
                }

                if (isset($equipmentItem['classification'])) {
                    $equipment->setClassification($equipmentItem['classification']);
                }

                if (isset($equipmentItem['dropsIn'])) {
                    $equipment->setDropsIn($equipmentItem['dropsIn']);
                }

                if (isset($equipmentItem['dexterityRequirement'])) {
                    $equipment->setDexterityRequirement($equipmentItem['dexterityRequirement']);
                }

                if (isset($equipmentItem['intelligenceRequirement'])) {
                    $equipment->setIntelligenceRequirement($equipmentItem['intelligenceRequirement']);
                }

                if (isset($equipmentItem['strengthRequirement'])) {
                    $equipment->setStrengthRequirement($equipmentItem['strengthRequirement']);
                }

                if (isset($equipmentItem['set'])) {
                    $equipment->setSet($equipmentItem['set']);
                }

                if (isset($equipmentItem['act'])) {
                    $equipment->setAct($equipmentItem['act']);
                }

                if (isset($equipmentItem['description'])) {
                    $equipment->setDescription($equipmentItem['description']);
                }

                if (isset($equipmentItem['bonus'])) {
                    $equipment->setBonus($equipmentItem['bonus']);
                }

                if (isset($equipmentItem['summons'])) {
                    $equipment->setSummons($equipmentItem['summons']);
                }

                $this->em->persist($equipment);
                $this->em->flush();
            }
        }


    }

    public function parseSets(): void
    {
        $content = $this->getContentFromFile($this->kernel, 'sets');

        foreach ($content as $set) {
            $equipmentSet = new EquipmentSet();
            $equipmentSet->setName($set['name']);
            $equipmentSet->setTag($set['tag']);
            $equipmentSet->setItems(implode(',', $set['items']));
            $equipmentSet->setProperties($set['properties']);

            $this->em->persist($equipmentSet);
        }

        $this->em->flush();
    }
}
