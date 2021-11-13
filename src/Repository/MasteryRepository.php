<?php

namespace App\Repository;

use App\Entity\Mastery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mastery|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mastery|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mastery[]    findAll()
 * @method Mastery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MasteryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mastery::class);
    }

    // /**
    //  * @return Mastery[] Returns an array of Mastery objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mastery
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
