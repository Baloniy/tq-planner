<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Equipment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EquipmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipment::class);
    }

    public function findAllEquipmentOrderedByNewest($params = [])
    {
        $queryBuilder = $this->createQueryBuilder('e')
            ->leftJoin('e.equipmentType', 'et')
            ->orderBy('e.created_at', 'DESC');

        if (isset($params['q'])) {
            $queryBuilder->andWhere('e.name LIKE :searchTerm OR e.description LIKE :searchTerm')
                ->setParameter('searchTerm', '%' . $params['q'] . '%');
        }

        if (isset($params['type'])) {
            $queryBuilder->andWhere('et.id = :type')
                ->setParameter('type', $params['type']);
        }

        return $queryBuilder
            ->setMaxResults(50)
            ->getQuery()
            ->getResult();
    }
}
