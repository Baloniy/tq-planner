<?php

namespace App\Repository;

use App\Entity\Rebus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rebus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rebus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rebus[]    findAll()
 * @method Rebus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RebusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rebus::class);
    }

    // /**
    //  * @return Rebus[] Returns an array of Rebus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rebus
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
